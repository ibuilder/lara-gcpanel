<?php

namespace App\Http\Controllers\Modules;

use App\Models\Field\DailyReport;
use App\Models\Field\PhotoLibrary;
use App\Models\Field\Schedule;
use App\Models\Field\Checklist;
use App\Models\Field\Punchlist;
use App\Models\Field\PullPlanning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FieldController extends Controller
{
    public function index()
    {
        // Fetch all daily reports for the authenticated user
        $dailyReports = DailyReport::where('user_id', Auth::id())->get();
        return view('modules.field.index', compact('dailyReports'));
    }

    public function createDailyReport()
    {
        return view('modules.field.create_daily_report');
    }

    public function storeDailyReport(Request $request)
    {
        $request->validate([
            'weather' => 'required|string',
            'report' => 'required|string',
        ]);

        DailyReport::create([
            'user_id' => Auth::id(),
            'weather' => $request->weather,
            'report' => $request->report,
        ]);

        return redirect()->route('field.index')->with('success', 'Daily report created successfully.');
    }

    public function editDailyReport($id)
    {
        $dailyReport = DailyReport::findOrFail($id);
        return view('modules.field.edit_daily_report', compact('dailyReport'));
    }

    public function updateDailyReport(Request $request, $id)
    {
        $request->validate([
            'weather' => 'required|string',
            'report' => 'required|string',
        ]);

        $dailyReport = DailyReport::findOrFail($id);
        $dailyReport->update($request->only('weather', 'report'));

        return redirect()->route('field.index')->with('success', 'Daily report updated successfully.');
    }

    public function destroyDailyReport($id)
    {
        $dailyReport = DailyReport::findOrFail($id);
        if ($dailyReport->user_id !== Auth::id()) {
            return redirect()->route('field.index')->with('error', 'Unauthorized action.');
        }

        $dailyReport->delete();
        return redirect()->route('field.index')->with('success', 'Daily report deleted successfully.');
    }

    // Additional methods for PhotoLibrary, Schedule, Checklist, Punchlist, and PullPlanning can be added here
}