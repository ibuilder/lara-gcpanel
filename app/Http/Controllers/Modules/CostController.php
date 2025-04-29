<?php

namespace App\Http\Controllers\Modules\Cost;

use App\Http\Controllers\Controller;
use App\Models\Modules\Cost\CostModel; // Assuming you have a model for Cost
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostController extends Controller
{
    public function index()
    {
        $costs = CostModel::all(); // Fetch all cost records
        return view('modules.cost.index', compact('costs'));
    }

    public function create()
    {
        return view('modules.cost.create'); // Show form to create a new cost record
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            // Add other validation rules as necessary
        ]);

        $cost = new CostModel();
        $cost->name = $request->name;
        $cost->amount = $request->amount;
        $cost->user_id = Auth::id(); // Associate the cost with the authenticated user
        $cost->save();

        return redirect()->route('cost.index')->with('success', 'Cost record created successfully.');
    }

    public function show($id)
    {
        $cost = CostModel::findOrFail($id);
        return view('modules.cost.show', compact('cost'));
    }

    public function edit($id)
    {
        $cost = CostModel::findOrFail($id);
        return view('modules.cost.edit', compact('cost'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            // Add other validation rules as necessary
        ]);

        $cost = CostModel::findOrFail($id);
        $cost->name = $request->name;
        $cost->amount = $request->amount;
        $cost->save();

        return redirect()->route('cost.index')->with('success', 'Cost record updated successfully.');
    }

    public function destroy($id)
    {
        $cost = CostModel::findOrFail($id);
        if ($cost->user_id === Auth::id() || Auth::user()->hasRole('administrator')) {
            $cost->delete();
            return redirect()->route('cost.index')->with('success', 'Cost record deleted successfully.');
        }

        return redirect()->route('cost.index')->with('error', 'You do not have permission to delete this record.');
    }
}