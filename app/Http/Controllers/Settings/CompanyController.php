<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Eager load user count and paginate
        $companies = Company::withCount('users')->latest()->paginate(15); // Adjust pagination size as needed

        return view('settings.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('settings.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:companies,name',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
        ]);

        Company::create($validated);

        return redirect()->route('settings.company_management.index')
                         ->with('success', 'Company created successfully.'); // Add success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): View // Renamed parameter
    {
        // Eager load users if showing details here
        // $company->load('users');
        // return view('settings.companies.show', compact('company'));
        // Or more commonly, just redirect to edit for management screens
        return redirect()->route('settings.company_management.edit', $company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View // Renamed parameter
    {
        return view('settings.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company): RedirectResponse // Renamed parameter
    {
        $validated = $request->validate([
             // Ensure name is unique, ignoring the current company's name
            'name' => 'required|string|max:255|unique:companies,name,' . $company->id,
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
        ]);

        $company->update($validated);

        return redirect()->route('settings.company_management.index')
                         ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse // Renamed parameter
    {
        try {
            // Optional: Add check if company has associated users and prevent deletion
            // if ($company->users()->count() > 0) {
            //     return redirect()->route('settings.company_management.index')
            //                      ->with('error', 'Cannot delete company with associated users.');
            // }

            $company->delete();

            return redirect()->route('settings.company_management.index')
                             ->with('success', 'Company deleted successfully.');

        } catch (\Exception $e) {
             // Log the error
             \Log::error("Error deleting company {$company->id}: " . $e->getMessage());
             return redirect()->route('settings.company_management.index')
                             ->with('error', 'Failed to delete company. Please check logs.');
        }
    }
}