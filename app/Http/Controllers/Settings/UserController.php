<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company; // Add Company model
use App\Models\Role;    // Add Role model
use Illuminate\Http\Request;
use Illuminate\View\View; // Add View
use Illuminate\Http\RedirectResponse; // Add RedirectResponse
use Illuminate\Support\Facades\Hash; // Add Hash facade
use Illuminate\Validation\Rules; // Add Rules namespace for password validation
use Illuminate\Support\Facades\Auth; // Add Auth facade
use Illuminate\Support\Facades\DB; // Add DB facade if not already imported
use Illuminate\Validation\Rule; // Add Rule for unique email check

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Eager load company and roles, paginate
        $users = User::with(['company', 'roles'])
                     ->latest()
                     ->paginate(15); // Adjust pagination size

        return view('settings.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Add logic later
        $companies = Company::orderBy('name')->pluck('name', 'id');
        $roles = Role::orderBy('display_name')->pluck('display_name', 'id');
        return view('settings.users.create', compact('companies', 'roles')); // Placeholder
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'company_id' => ['nullable', 'exists:companies,id'], // Allow null or existing company
            'roles' => ['required', 'array'], // Ensure roles are provided
            'roles.*' => ['exists:roles,id'], // Ensure each role ID exists
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Start transaction in case role attachment fails
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'company_id' => $request->company_id,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(), // Optionally verify email immediately or send verification link
            ]);

            $user->roles()->sync($request->input('roles', [])); // Sync roles

            DB::commit(); // Commit transaction

            return redirect()->route('settings.user_management.index')
                             ->with('success', 'User created successfully.');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            \Log::error("User creation failed: " . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to create user. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     * (Usually not needed for user management list, redirect to edit)
     */
    public function show(User $user): RedirectResponse // Changed parameter name
    {
        return redirect()->route('settings.user_management.edit', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View // Changed parameter name
    {
         // Add logic later
         $companies = Company::orderBy('name')->pluck('name', 'id');
         $roles = Role::orderBy('display_name')->pluck('display_name', 'id');
         $user->load('roles'); // Ensure roles are loaded for the form
         return view('settings.users.edit', compact('user', 'companies', 'roles')); // Placeholder
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
         // Check if trying to remove the last admin role
        $isLastAdmin = $user->hasRole('administrator') && User::whereHas('roles', fn($q) => $q->where('name', 'administrator'))->count() <= 1;
        $requestedRoles = $request->input('roles', []);
        $adminRoleId = Role::where('name', 'administrator')->first()?->id;

        if ($isLastAdmin && $adminRoleId && !in_array($adminRoleId, $requestedRoles)) {
             return back()->withInput()->with('error', 'Cannot remove the role from the last administrator.');
        }


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Ensure email is unique, ignoring the current user's email
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'company_id' => ['nullable', 'exists:companies,id'],
            'roles' => ['required', 'array'],
            'roles.*' => ['exists:roles,id'],
            // Password validation only if password field is not empty
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::beginTransaction();
        try {
            $userData = $request->only(['name', 'email', 'company_id']);

            // Only update password if provided
            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);

            $user->roles()->sync($requestedRoles); // Sync roles

            DB::commit();

            return redirect()->route('settings.user_management.index')
                             ->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("User update failed for user {$user->id}: " . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to update user. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // Prevent deleting oneself
        if (Auth::id() === $user->id) {
            return redirect()->route('settings.user_management.index')
                             ->with('error', 'You cannot delete your own account.');
        }

        // Prevent deleting the last administrator
        if ($user->hasRole('administrator') && User::whereHas('roles', fn($q) => $q->where('name', 'administrator'))->count() <= 1) {
             return redirect()->route('settings.user_management.index')
                             ->with('error', 'Cannot delete the last administrator account.');
        }

        try {
            // Detach roles before deleting user (optional, cascade might handle it)
            // $user->roles()->detach();
            $user->delete();

            return redirect()->route('settings.user_management.index')
                             ->with('success', 'User deleted successfully.');

        } catch (\Exception $e) {
             \Log::error("Error deleting user {$user->id}: " . $e->getMessage());
             return redirect()->route('settings.user_management.index')
                             ->with('error', 'Failed to delete user. Please check logs.');
        }
    }
}