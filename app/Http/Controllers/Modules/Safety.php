<?php

namespace App\Http\Controllers\Modules;

use App\Models\Modules\Safety\Observation;
use App\Models\Modules\Safety\PreTaskPlan;
use App\Models\Modules\Safety\JobHazardAnalysis;
use App\Models\Modules\Safety\EmployeeOrientation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SafetyController extends Controller
{
    public function index()
    {
        // Fetch all safety records based on user role
        $observations = Observation::all();
        $preTaskPlans = PreTaskPlan::all();
        $jobHazardAnalyses = JobHazardAnalysis::all();
        $employeeOrientations = EmployeeOrientation::all();

        return view('modules.safety.index', compact('observations', 'preTaskPlans', 'jobHazardAnalyses', 'employeeOrientations'));
    }

    public function createObservation()
    {
        return view('modules.safety.create_observation');
    }

    public function storeObservation(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $observation = new Observation();
        $observation->title = $request->title;
        $observation->description = $request->description;
        $observation->user_id = Auth::id();
        $observation->save();

        return redirect()->route('safety.index')->with('success', 'Observation created successfully.');
    }

    public function editObservation($id)
    {
        $observation = Observation::findOrFail($id);
        return view('modules.safety.edit_observation', compact('observation'));
    }

    public function updateObservation(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $observation = Observation::findOrFail($id);
        $observation->title = $request->title;
        $observation->description = $request->description;
        $observation->save();

        return redirect()->route('safety.index')->with('success', 'Observation updated successfully.');
    }

    public function destroyObservation($id)
    {
        $observation = Observation::findOrFail($id);
        if ($observation->user_id === Auth::id() || Auth::user()->hasRole('administrator')) {
            $observation->delete();
            return redirect()->route('safety.index')->with('success', 'Observation deleted successfully.');
        }

        return redirect()->route('safety.index')->with('error', 'Unauthorized action.');
    }

    // Similar methods for PreTaskPlans, JobHazardAnalyses, and EmployeeOrientations can be added here
}