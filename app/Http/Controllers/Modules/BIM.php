<?php

namespace App\Http\Controllers\Modules;

use App\Models\Modules\BIM as BIMModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BIMController extends Controller
{
    public function index()
    {
        $bimRecords = BIMModel::all();
        return view('modules.bim.index', compact('bimRecords'));
    }

    public function create()
    {
        return view('modules.bim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other validation rules as necessary
        ]);

        BIMModel::create($request->all());
        return redirect()->route('bim.index')->with('success', 'Record created successfully.');
    }

    public function show($id)
    {
        $bimRecord = BIMModel::findOrFail($id);
        return view('modules.bim.show', compact('bimRecord'));
    }

    public function edit($id)
    {
        $bimRecord = BIMModel::findOrFail($id);
        return view('modules.bim.edit', compact('bimRecord'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other validation rules as necessary
        ]);

        $bimRecord = BIMModel::findOrFail($id);
        $bimRecord->update($request->all());
        return redirect()->route('bim.index')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        $bimRecord = BIMModel::findOrFail($id);
        $bimRecord->delete();
        return redirect()->route('bim.index')->with('success', 'Record deleted successfully.');
    }
}