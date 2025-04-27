php
<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Company;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies=Company::all();
        return view('projects.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'address' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'company_id' => 'required|exists:companies,id',
        ]);

        Project::create($validatedData);

        return redirect()->route('modules.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $companies=Company::all();
        return view('projects.edit', compact('project','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'address' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'company_id' => 'required|exists:companies,id',
        ]);
        $project->update($validatedData);
        return redirect()->route('settings.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }