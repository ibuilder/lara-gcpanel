<?php

namespace App\Http\Controllers\Modules\Preconstruction;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\BidManual;
use Illuminate\Http\Request;

class BidManualController extends Controller
{
    public function index()
    {
        $bidManuals = BidManual::all();
        return view('modules.preconstruction.bid_manual.index', compact('bidManuals'));
    }

    public function create()
    {
        $projects = Project::all(); // Get all the projects to pass them to the view
        return view('modules.preconstruction.bid_manual.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([ // Validate the data, the file and name are required, the description can be null and the project_id must exists in the database
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'file_path' => 'required|string'
        ]);

        BidManual::create($validatedData);

        return redirect()->route('modules.preconstruction.bid_manual.index')->with('success', 'Bid manual created successfully.');
    }

    public function edit(BidManual $bidManual)
    {
        $projects = Project::all(); // Get all the projects to pass them to the view
        return view('modules.preconstruction.bid_manual.edit', compact('bidManual', 'projects'));
    }

    public function update(Request $request, BidManual $bidManual)
    {
        $validatedData = $request->validate([ // Validate the data, the file and name are required, the description can be null and the project_id must exists in the database
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'file_path' => 'required|string'
        ]);

        $bidManual->update($validatedData);

        return redirect()->route('modules.preconstruction.bid_manual.index')->with('success', 'Bid manual updated successfully.');
    }

    public function destroy(BidManual $bidManual)
    {
        $bidManual->delete();

        return redirect()->route('modules.preconstruction.bid_manual.index')->with('success', 'Bid manual deleted successfully.');
    }
}