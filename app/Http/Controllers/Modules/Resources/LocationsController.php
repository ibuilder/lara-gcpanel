<?php
// filepath: app/Http/Controllers/Modules/Resources/LocationController.php
<?php

namespace App\Http\Controllers\Modules\Resources; // Adjust namespace if needed

use App\Http\Controllers\Controller;
use App\Models\Modules\Resources\Location; // Adjust namespace if needed
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule; // Add Rule

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $locations = Location::latest()->paginate(15); // Simple pagination
        return view('modules.resources.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Add logic later
        return view('modules.resources.locations.create'); // Placeholder
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:50', Rule::unique('locations', 'code')],
            'description' => ['nullable', 'string'],
            // 'parent_id' => ['nullable', 'exists:locations,id'], // Validate if using hierarchy
        ]);

        Location::create($validated);

        return redirect()->route('modules.resources.locations.index')
                         ->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource. (Optional - often redirect to edit)
     */
    public function show(Location $location): View|RedirectResponse // Adjust model name if needed
    {
        // return view('modules.resources.locations.show', compact('location'));
        return redirect()->route('modules.resources.locations.edit', $location);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location): View // Adjust model name if needed
    {
         // Optional: Fetch parent locations if using hierarchy, excluding the current one
         // $parentLocations = Location::where('id', '!=', $location->id)->orderBy('name')->get();
         return view('modules.resources.locations.edit', compact('location' /*, 'parentLocations'*/));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location): RedirectResponse // Adjust model name if needed
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Ensure code is unique, ignoring the current location's code
            'code' => ['nullable', 'string', 'max:50', Rule::unique('locations', 'code')->ignore($location->id)],
            'description' => ['nullable', 'string'],
            // 'parent_id' => ['nullable', 'exists:locations,id', Rule::notIn([$location->id])], // Prevent self-parenting
        ]);

        $location->update($validated);

        return redirect()->route('modules.resources.locations.index')
                         ->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location): RedirectResponse // Adjust model name if needed
    {
        try {
            // Optional: Add checks here if locations are linked to other critical data
            // For example, if RFIs or Submittals are tied to locations:
            // if ($location->rfis()->exists() || $location->submittals()->exists()) {
            //     return redirect()->route('modules.resources.locations.index')
            //                      ->with('error', 'Cannot delete location as it is linked to other records.');
            // }

            // If using hierarchy, decide how to handle children (e.g., set parent_id to null, delete children, prevent deletion)
            // Location::where('parent_id', $location->id)->update(['parent_id' => null]); // Example: Orphan children

            $location->delete();

            return redirect()->route('modules.resources.locations.index')
                             ->with('success', 'Location deleted successfully.');

        } catch (\Exception $e) {
             \Log::error("Error deleting location {$location->id}: " . $e->getMessage());
             return redirect()->route('modules.resources.locations.index')
                             ->with('error', 'Failed to delete location. Check if it is linked to other records.');
        }
    }
}