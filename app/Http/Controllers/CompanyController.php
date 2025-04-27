php
<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->get();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|unique:companies|max:255',
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email|unique:companies',
                'website' => 'nullable|string',
            ]
        ]);

        Company::create($validatedData);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|unique:companies,name,' . $company->id . '|max:255',
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email|unique:companies,email,' . $company->id,
                'website' => 'nullable|string',
            ]
        ]);

        $company->update($validatedData);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}