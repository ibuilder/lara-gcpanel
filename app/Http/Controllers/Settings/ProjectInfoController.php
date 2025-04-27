<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\ProjectInfo; // Import the model
use Illuminate\Http\Request;
use Illuminate\View\View; // Add View
use Illuminate\Http\RedirectResponse; // Add RedirectResponse

class ProjectInfoController extends Controller
{
    /**
     * Display the project info settings form.
     * We use firstOrCreate to ensure a record exists.
     */
    public function index(): View
    {
        // Get the first record, or create an empty one if none exists
        $projectInfo = ProjectInfo::firstOrCreate(
            ['id' => 1], // Use a fixed ID or other condition to find the single record
            [ /* Default values if creating */
                'project_name' => config('app.name', 'gcPanel Project'), // Default to app name
            ]
        );

        return view('settings.project_info', compact('projectInfo'));
    }

    /**
     * Store or Update the project information.
     * Since we only have one record, 'store' and 'update' do the same thing.
     * Route definition uses resource, so we implement update.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'project_name' => 'nullable|string|max:255',
            'project_number' => 'nullable|string|max:100',
            'project_address' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'project_manager_name' => 'nullable|string|max:255',
            // Add validation for other fields
        ]);

        // Find the record (usually ID 1) or create if missing, then update
        $projectInfo = ProjectInfo::updateOrCreate(
            ['id' => 1], // Condition to find the single record
            $validated      // Data to update or create with
        );

        // Optional: Update config on the fly if needed (use cautiously)
        // config(['app.name' => $validated['project_name']]);

        return redirect()->route('settings.project_info.index')
                         ->with('success', 'Project information updated successfully.');
    }

    // Note: The 'store' method defined in the resource route isn't strictly
    // necessary here as we handle creation/update in 'update' via updateOrCreate.
    // If you hit the store route, you could redirect or call update.
    public function store(Request $request): RedirectResponse
    {
        return $this->update($request);
    }
}