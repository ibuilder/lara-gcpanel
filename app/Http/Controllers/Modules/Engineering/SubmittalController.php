php
<?php

namespace App\Http\Controllers\Modules\Engineering;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Submittal;

class SubmittalController extends Controller
{
    public function index()
    {
        $submittals = Submittal::all();
        return view('modules.engineering.submittals.index', compact('submittals'));
    }

    public function create()
    {
        $projects = Project::all();        
        return view('modules.engineering.submittals.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'project_id' => 'required|exists:projects,id',
            'status' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        Submittal::create($request->all());
        return redirect()->route('modules.engineering.submittals.index')->with('success', 'Submittal created successfully.');
    }

    public function edit(Submittal $submittal)    
    {
        $projects = Project::all();        
        return view('modules.engineering.submittals.edit', compact('submittal', 'projects'));
    }




    
    public function update(Request $request, Submittal $submittal)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'project_id' => 'required|exists:projects,id',
            'status' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        $submittal->update($request->all());
        return redirect()->route('modules.engineering.submittals.index')->with('success', 'Submittal updated successfully.');
    }

    public function destroy(Submittal $submittal)
    {
        $submittal->delete();
        return redirect()->route('modules.engineering.submittals.index')->with('success', 'Submittal deleted successfully.');
    }
}