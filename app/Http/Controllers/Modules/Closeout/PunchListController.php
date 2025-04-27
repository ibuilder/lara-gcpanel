php
<?php

namespace App\Http\Controllers\Modules\Closeout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PunchList;
use App\Models\Project;

class PunchListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $punchLists = PunchList::all();
        return view('modules.closeout.punch_lists.index', compact('punchLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('modules.closeout.punch_lists.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'project_id' => 'required|exists:projects,id',
        'description' => 'required',
        'location' => 'required',
        'status' => 'nullable',
        'due_date' => 'nullable|date',
    ]);

      PunchList::create($validatedData);

      return redirect()->route('modules.closeout.punch_lists.index')->with('success', 'Punch List created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PunchList $punchList)
    {
        $projects = Project::all();
        return view('modules.closeout.punch_lists.edit', compact('punchList', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PunchList $punchList)
    {
      $validatedData = $request->validate([
        'project_id' => 'required|exists:projects,id',
        'description' => 'required',
        'location' => 'required',
        'status' => 'nullable',
        'due_date' => 'nullable|date',
    ]);

      $punchList->update($validatedData);

      return redirect()->route('modules.closeout.punch_lists.index')->with('success', 'Punch List updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PunchList $punchList)
    {
        $punchList->delete();

        return redirect()->route('modules.closeout.punch_lists.index')->with('success', 'Punch List deleted successfully.');
    }
}