<?php

namespace App\Http\Controllers\Modules;

use App\Models\Modules\Engineering\RFI;
use App\Models\Modules\Engineering\Submittal;
use App\Models\Modules\Engineering\Drawing;
use App\Models\Modules\Engineering\Specification;
use App\Models\Modules\Engineering\FileExplorer;
use App\Models\Modules\Engineering\Permit;
use App\Models\Modules\Engineering\MeetingAgenda;
use App\Models\Modules\Engineering\Transmittal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EngineeringController extends Controller
{
    // Display a listing of RFIs
    public function indexRFIs()
    {
        $rfis = RFI::sortable()->filter(request(['search']))->paginate(10);
        return view('modules.engineering.rfis.index', compact('rfis'));
    }

    // Show the form for creating a new RFI
    public function createRFI()
    {
        return view('modules.engineering.rfis.create');
    }

    // Store a newly created RFI in storage
    public function storeRFI(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $rfi = new RFI($request->all());
        $rfi->user_id = Auth::id();
        $rfi->save();

        return redirect()->route('engineering.rfis.index')->with('success', 'RFI created successfully.');
    }

    // Display the specified RFI
    public function showRFI($id)
    {
        $rfi = RFI::findOrFail($id);
        return view('modules.engineering.rfis.show', compact('rfi'));
    }

    // Show the form for editing the specified RFI
    public function editRFI($id)
    {
        $rfi = RFI::findOrFail($id);
        return view('modules.engineering.rfis.edit', compact('rfi'));
    }

    // Update the specified RFI in storage
    public function updateRFI(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $rfi = RFI::findOrFail($id);
        $rfi->update($request->all());

        return redirect()->route('engineering.rfis.index')->with('success', 'RFI updated successfully.');
    }

    // Remove the specified RFI from storage
    public function destroyRFI($id)
    {
        $rfi = RFI::findOrFail($id);
        if ($rfi->user_id === Auth::id() || Auth::user()->hasRole('administrator')) {
            $rfi->delete();
            return redirect()->route('engineering.rfis.index')->with('success', 'RFI deleted successfully.');
        }

        return redirect()->route('engineering.rfis.index')->with('error', 'Unauthorized action.');
    }

    // Similar methods for Submittals, Drawings, Specifications, etc.
}