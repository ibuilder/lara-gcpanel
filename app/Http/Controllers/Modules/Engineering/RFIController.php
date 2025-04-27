php
<?php

namespace App\Http\Controllers\Modules\Engineering;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Rfi;
use Illuminate\Http\Request;

class RfiController extends Controller
{
    /** Display a listing of the resource. */
    public function index()
    {
        $rfis = Rfi::all();
        return view('modules.engineering.rfis.index', compact('rfis'));
    }

    /** Show the form for creating a new resource. */
    public function create()
    {
        $projects = Project::all();
        return view('modules.engineering.rfis.create', compact('projects'));
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'question' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'answer' => 'nullable|string',
            'status' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);
        Rfi::create($validatedData);

        return redirect()->route('modules.engineering.rfis.index')->with('success', 'RFI created successfully.');
    }

    /** Show the form for editing the specified resource. */
    public function edit(Rfi $rfi)
    {
        $projects = Project::all();
        return view('modules.engineering.rfis.edit', compact('rfi', 'projects'));
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, Rfi $rfi)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'question' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'answer' => 'nullable|string',
            'status' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);
        $rfi->update($validatedData);
        return redirect()->route('modules.engineering.rfis.index')->with('success', 'RFI updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rfi::destroy($id);
        return redirect()->route('modules.engineering.rfis.index')->with('success', 'RFI deleted successfully.');
    }
}