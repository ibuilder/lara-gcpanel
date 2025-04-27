php
<?php

namespace App\Http\Controllers\Modules\Field;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use App\Models\Project;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $observations = Observation::all();
        return view('modules.field.observations.index', compact('observations'));
    }
    {
        return view('modules.field.observations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $projects = Project::all();

        return view('modules.field.observations.create', compact('projects'));
        return view('modules.field.observations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string',
            'project_id' => 'required|exists:projects,id'
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        
        $projects = Project::all();

        return view('modules.field.observations.edit', compact('projects'));
        return view('modules.field.observations.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {        
        $validatedData = $request->validate([
            'date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string',
            'project_id' => 'required|exists:projects,id'
        ]);

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}