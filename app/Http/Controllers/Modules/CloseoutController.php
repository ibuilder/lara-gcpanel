<?php

namespace App\Http\Controllers\Modules\Closeout;

use App\Models\Modules\Closeout\OmManual;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OmManualController extends Controller
{
    public function index()
    {
        $omManuals = OmManual::all();
        return view('modules.closeout.om_manual.index', compact('omManuals'));
    }

    public function create()
    {
        return view('modules.closeout.om_manual.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        OmManual::create($request->all());
        return redirect()->route('closeout.om_manual.index')->with('success', 'O&M Manual created successfully.');
    }

    public function show($id)
    {
        $omManual = OmManual::findOrFail($id);
        return view('modules.closeout.om_manual.show', compact('omManual'));
    }

    public function edit($id)
    {
        $omManual = OmManual::findOrFail($id);
        return view('modules.closeout.om_manual.edit', compact('omManual'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $omManual = OmManual::findOrFail($id);
        $omManual->update($request->all());
        return redirect()->route('closeout.om_manual.index')->with('success', 'O&M Manual updated successfully.');
    }

    public function destroy($id)
    {
        $omManual = OmManual::findOrFail($id);
        $omManual->delete();
        return redirect()->route('closeout.om_manual.index')->with('success', 'O&M Manual deleted successfully.');
    }
}