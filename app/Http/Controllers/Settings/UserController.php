<?php


namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('settings.users.create', compact('roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('settings.users.edit', compact('user', 'roles'));
    }
    public function store(Request $request)
    {
        // Validate the user data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Assign roles to the user
        $user->roles()->sync($request->roles);

        return redirect()->route('settings.user_management.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user)
    {
        // Validate the user data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update the user
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);
        $user->roles()->sync($request->roles);
        return redirect()->route('settings.user_management.index')->with('success', 'User updated successfully.');
    }
}