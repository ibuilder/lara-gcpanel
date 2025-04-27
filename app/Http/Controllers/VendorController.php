php
<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $vendors = Vendor::all();
        return view('vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {    
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
         $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);


        Vendor::create($validatedData);

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vendor  $vendor
     * @return View
     */
    public function edit(Vendor $vendor): View
    {
        return view('vendors.edit', ['vendor' => $vendor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Vendor  $vendor
     * @return RedirectResponse
     */
    public function update(Request $request, Vendor $vendor): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        $vendor->update($validatedData);

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Vendor  $vendor
     * @return RedirectResponse
     */
    public function destroy(Vendor $vendor): RedirectResponse
    {
        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}