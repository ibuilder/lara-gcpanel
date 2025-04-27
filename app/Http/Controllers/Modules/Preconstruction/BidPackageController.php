php
<?php

namespace App\Http\Controllers\Modules\Preconstruction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\BidPackage;

class BidPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
     {
        $bidPackages = BidPackage::all();
        return view('modules.preconstruction.bid_packages.index', compact('bidPackages'));
    {
        return view('modules.preconstruction.bid_packages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
     {
        $projects = Project::all();
        return view('modules.preconstruction.bid_packages.create', compact('projects'));
        return view('modules.preconstruction.bid_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
        ]);
        BidPackage::create($validatedData);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidPackage $bidPackage)
     {
        $projects = Project::all();
        return view('modules.preconstruction.bid_packages.edit', compact('bidPackage', 'projects'));

        return view('modules.preconstruction.bid_packages.edit', compact('bidPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidPackage $bidPackage)
     {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
        ]);

        $bidPackage->update($validatedData);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidPackage $bidPackage)
    {
        //
    }
}