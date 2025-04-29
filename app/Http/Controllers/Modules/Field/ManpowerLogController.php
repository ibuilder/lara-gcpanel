<?php

namespace App\Http\Controllers\Modules\Field;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ManpowerLog;
use Illuminate\Http\Request;

class ManpowerLogController extends Controller
{
    public function index()
    {
        $manpowerLogs = ManpowerLog::with('project')->get();
        return view('modules.field.manpower_logs.index', compact('manpowerLogs'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('modules.field.manpower_logs.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'date' => 'required|date',
            'trade' => 'required',
            'quantity' => 'required|integer',
        ]);

        ManpowerLog::create($validatedData);

        return redirect()->route('modules.field.manpower_logs.index')->with('success', 'Manpower Log created successfully.');
    }

    public function edit(ManpowerLog $manpower_log)
    {
        $projects = Project::all();
        return view('modules.field.manpower_logs.edit', compact('manpower_log', 'projects'));
    }

    public function update(Request $request, ManpowerLog $manpower_log)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'date' => 'required|date',
            'trade' => 'required',
            'quantity' => 'required|integer',
        ]);

        $manpower_log->update($validatedData);

        return redirect()->route('modules.field.manpower_logs.index')->with('success', 'Manpower Log updated successfully.');
    }

    public function destroy(ManpowerLog $manpower_log)
    {
        $manpower_log->delete();
        return redirect()->route('modules.field.manpower_logs.index')->with('success', 'Manpower Log deleted successfully.');
    }
}