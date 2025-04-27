@php
use App\Helpers\FormHelper;
@endphp

@open(['class' => 'form-horizontal'])
    @csrf

    <fieldset>
        <legend>Checklist Information</legend>

        <div class="form-group">
            <label for="checklist_name">Checklist Name</label>
            @input(['name' => 'checklist_name', 'id' => 'checklist_name', 'value' => isset($checklist) ? $checklist->checklist_name : null])
        </div>

        <div class="form-group">
            <label for="project_id">Project</label>
            @select(['name' => 'project_id', 'id' => 'project_id', 'options' => App\Models\ProjectInfo::pluck('name', 'id'), 'selected' => isset($checklist) ? $checklist->project_id : null])
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            @input(['type' => 'date', 'name' => 'date', 'id' => 'date', 'value' => isset($checklist) ? $checklist->date : null])
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            @input(['name' => 'location', 'id' => 'location', 'value' => isset($checklist) ? $checklist->location : null])
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            @input(['name' => 'description', 'id' => 'description', 'value' => isset($checklist) ? $checklist->description : null])
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            @select(['name' => 'status', 'id' => 'status', 'options' => ['Draft' => 'Draft', 'In Progress' => 'In Progress', 'Complete' => 'Complete'], 'selected' => isset($checklist) ? $checklist->status : null])
        </div>

        <div class="form-group">
            <label for="assigned_to">Assign To</label>
            @select(['name' => 'assigned_to', 'id' => 'assigned_to', 'options' => App\Models\User::pluck('name', 'id'), 'selected' => isset($checklist) ? $checklist->assigned_to : null])
        </div>
    </fieldset>

    <fieldset>
        <legend>Items</legend>
        </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>
@close