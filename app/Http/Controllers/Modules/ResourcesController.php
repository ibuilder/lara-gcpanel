<?php

namespace App\Http\Controllers\Modules;

use App\Models\Resources; // Assuming you have a Resources model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourcesController extends Controller
{
    public function index()
    {
        $resources = Resources::all(); // Fetch all resources
        return view('modules.resources.index', compact('resources'));
    }

    public function create()
    {
        return view('modules.resources.create'); // Show create form
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other validation rules as necessary
        ]);

        $resource = new Resources();
        $resource->name = $request->name;
        $resource->description = $request->description;
        $resource->user_id = Auth::id(); // Associate resource with the authenticated user
        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Resource created successfully.');
    }

    public function show($id)
    {
        $resource = Resources::findOrFail($id);
        return view('modules.resources.show', compact('resource'));
    }

    public function edit($id)
    {
        $resource = Resources::findOrFail($id);
        return view('modules.resources.edit', compact('resource'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other validation rules as necessary
        ]);

        $resource = Resources::findOrFail($id);
        $resource->name = $request->name;
        $resource->description = $request->description;
        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy($id)
    {
        $resource = Resources::findOrFail($id);
        if ($resource->user_id !== Auth::id()) {
            return redirect()->route('resources.index')->with('error', 'You can only delete your own resources.');
        }
        $resource->delete();

        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
    }
}