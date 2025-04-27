php
<?php

namespace App\Http\Controllers\Modules\Closeout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deficiency;
use App\Models\Project;

class DeficiencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deficiencies = Deficiency::with('project')->get();
        return view('modules.closeout.deficiencies.index', compact('deficiencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('modules.closeout.deficiencies.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'description' => 'required',
            'location' => 'required'
        ]);        

        Deficiency::create($validatedData);

        return redirect()->route('modules.closeout.deficiencies.index')->with('success', 'Deficiency created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deficiency $deficiency)
    {
        $projects = Project::all();
        return view('modules.closeout.deficiencies.edit', compact('deficiency', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deficiency $deficiency)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'description' => 'required',
            'location' => 'required'
        ]);        
        $deficiency->update($validatedData);

        return redirect()->route('modules.closeout.deficiencies.index')->with('success', 'Deficiency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deficiency $deficiency)
    {
        $deficiency->delete();
        return redirect()->route('modules.closeout.deficiencies.index')->with('success', 'Deficiency deleted successfully.');
    }
}