php
<?php

namespace App\Http\Controllers\Modules\Field;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyLog;
use App\Models\Project;

class DailyLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailyLogs = DailyLog::with('project')->get();
        return view('modules.field.daily_logs.index', compact('dailyLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.field.daily_logs.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate($this->validationRules());
        DailyLog::create($validatedData);

        return redirect()->route('modules.field.daily_logs.index')->with('success', 'Daily Log created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyLog $dailyLog)
    {
        return view('modules.field.daily_logs.edit', compact('dailyLog', 'projects'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, DailyLog $dailyLog){
        $validatedData = $request->validate($this->validationRules());
        $dailyLog->update($validatedData);

        return redirect()->route('modules.field.daily_logs.index')->with('success', 'Daily Log updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyLog $dailyLog)
    {
        $dailyLog->delete();

        return redirect()->route('modules.field.daily_logs.index')->with('success', 'Daily Log deleted successfully.');
    }

     private function validationRules(){
        return [
            'project_id' => 'required|exists:projects,id',
            'date' => 'required|date',
            'weather' => 'nullable|string',
            'notes' => 'nullable|string',
        ];
    }
}
