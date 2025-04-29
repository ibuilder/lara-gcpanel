<?php

namespace App\Http\Controllers\Modules\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contract;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();
        return view('modules.procurement.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('modules.procurement.contracts.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateContract($request);

        Contract::create($validatedData);

        return redirect()->route('modules.procurement.contracts.index')
            ->with('success', 'Contract created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $projects = Project::all();
        return view('modules.procurement.contracts.edit', compact('contract', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $validatedData = $this->validateContract($request);
        $contract->update($validatedData);

        return redirect()->route('modules.procurement.contracts.index')->with('success', 'Contract updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('modules.procurement.contracts.index')->with('success', 'Contract deleted successfully.');
    }

    /**
     * Validate the contract data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateContract(Request $request)
    {
        return $request->validate([
            'project_id' => 'required|exists:projects,id',
            'vendor' => 'required',
            'description' => 'required',
            'amount' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
    }
}