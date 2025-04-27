<?php

namespace App\Http\Controllers\Modules\Contracts;

use App\Models\Modules\Contracts\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::sortable()->filter(request(['status']))->paginate(10);
        return view('modules.contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('modules.contracts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $contract = new Contract();
        $contract->title = $request->title;
        $contract->description = $request->description;
        $contract->status = $request->status;
        $contract->user_id = Auth::id();
        $contract->save();

        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }

    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return view('modules.contracts.show', compact('contract'));
    }

    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        return view('modules.contracts.edit', compact('contract'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $contract = Contract::findOrFail($id);
        $contract->title = $request->title;
        $contract->description = $request->description;
        $contract->status = $request->status;
        $contract->save();

        return redirect()->route('contracts.index')->with('success', 'Contract updated successfully.');
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        if ($contract->user_id !== Auth::id()) {
            return redirect()->route('contracts.index')->with('error', 'You can only delete your own contracts.');
        }
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully.');
    }
}