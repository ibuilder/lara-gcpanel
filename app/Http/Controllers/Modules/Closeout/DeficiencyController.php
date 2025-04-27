<?php

namespace App\Http\Controllers\Modules\Closeout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deficiency;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\StoreDeficiencyRequest; // Import Form Request

class DeficiencyController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Deficiency::class);

        // Eager load the 'project' relationship
        $deficiencies = Deficiency::with('project')->latest()->paginate(15); // Example pagination

        return view('modules.closeout.deficiencies.index', compact('deficiencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch only id and name (adjust 'name' if your project name column is different)
        $projects = Project::pluck('name', 'id');
        return view('modules.closeout.deficiencies.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeficiencyRequest $request) // Use Form Request
    {
        // Authorization and validation are handled by StoreDeficiencyRequest

        // Retrieve validated data
        $validatedData = $request->validated();

        Deficiency::create($validatedData);

        return redirect()->route('modules.closeout.deficiencies.index')->with('success', 'Deficiency created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deficiency $deficiency)
    {
        // Fetch only id and name
        $projects = Project::pluck('name', 'id');
        return view('modules.closeout.deficiencies.edit', compact('deficiency', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deficiency $deficiency)
    {
        $this->authorize('update', $deficiency);

        $validatedData = $request->validate([
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
        $this->authorize('delete', $deficiency);

        $deficiency->delete();
        return redirect()->route('modules.closeout.deficiencies.index')->with('success', 'Deficiency deleted successfully.');
    }
}