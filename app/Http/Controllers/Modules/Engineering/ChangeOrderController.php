php
<?php

namespace App\Http\Controllers\Modules\Engineering;

use App\Http\Controllers\Controller;
use App\Models\ChangeOrder;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChangeOrderController extends Controller
{
    public function index()
    {
        return view('modules.engineering.change_orders.index');
    }

    public function create()
    {
        $projects = Project::all();
        return view('modules.engineering.change_orders.create', compact('projects'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|integer',
            'project_id' => 'required|exists:projects,id',
            'requested_by' => 'nullable',
            'status' => 'nullable',
        ]);

        ChangeOrder::create($validatedData);

        return redirect()->route('modules.engineering.change_orders.index')->with('success', 'Change order created successfully.');
    }

    public function edit(ChangeOrder $change_order)
    {
        $projects = Project::all();
        return view('modules.engineering.change_orders.edit', compact('change_order', 'projects'));
    }

    public function update(Request $request, ChangeOrder $change_order): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|integer',
            'project_id' => 'required|exists:projects,id',
            'requested_by' => 'nullable',
            'status' => 'nullable',
        ]);

        $change_order->update($validatedData);

        return redirect()->route('modules.engineering.change_orders.index')->with('success', 'Change order updated successfully.');
    }

    public function destroy(ChangeOrder $change_order): RedirectResponse
    {
        $change_order->delete();

        return redirect()->route('modules.engineering.change_orders.index')->with('success', 'Change order deleted successfully.');
    }
}