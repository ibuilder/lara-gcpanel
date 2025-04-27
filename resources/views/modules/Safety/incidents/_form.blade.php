blade
<form action="{{ isset($incident) ? route('incidents.update', $incident) : route('incidents.store') }}" method="POST">
    @csrf
    @if(isset($incident))
        @method('PUT')
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <fieldset>
        <legend>Incident Information</legend>
        <div class="form-group">
            <label for="incident_number">Incident Number</label>
            @input(['name' => 'incident_number', 'value' => isset($incident) ? $incident->incident_number : null, 'id' => 'incident_number'])
        </div>

        <div class="form-group">
            <label for="project">Project</label>
            @input(['name' => 'project', 'value' => isset($incident) ? $incident->project : null, 'id' => 'project'])
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            @input(['name' => 'location', 'value' => isset($incident) ? $incident->location : null, 'id' => 'location'])
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            @input(['type' => 'date', 'name' => 'date', 'value' => isset($incident) ? $incident->date : null, 'id' => 'date'])
        </div>

        <div class="form-group">
            <label for="time">Time</label>
            @input(['type' => 'time', 'name' => 'time', 'value' => isset($incident) ? $incident->time : null, 'id' => 'time'])
        </div>
    </fieldset>

    <fieldset>
        <legend>Reporting Details</legend>
        <div class="form-group">
            <label for="reported_by">Reported By</label>
            @input(['name' => 'reported_by', 'value' => isset($incident) ? $incident->reported_by : null, 'id' => 'reported_by'])
        </div>
    </fieldset>
    <fieldset>
        <legend>Incident Details</legend>
        <div class="form-group">
            <label for="type_of_incident">Type of Incident</label>
            @select(['name' => 'type_of_incident', 'options' => ['Accident', 'Near Miss', 'Property Damage', 'Other'], 'selected' => isset($incident) ? $incident->type_of_incident : null, 'id' => 'type_of_incident'])
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            @textarea(['name' => 'description', 'value' => isset($incident) ? $incident->description : null, 'id' => 'description'])
        </div>
        <div class="form-group">
            <label for="people_involved">People Involved</label>
            @textarea(['name' => 'people_involved', 'value' => isset($incident) ? $incident->people_involved : null, 'id' => 'people_involved'])
        </div>
        <div class="form-group">
            <label for="witness_statements">Witness Statements</label>
            @textarea(['name' => 'witness_statements', 'value' => isset($incident) ? $incident->witness_statements : null, 'id' => 'witness_statements'])
        </div>
    </fieldset>

    <fieldset>
        <legend>Post-Incident Information</legend>
        <div class="form-group">
            <label for="injuries">Injuries</label>
            @textarea(['name' => 'injuries', 'value' => isset($incident) ? $incident->injuries : null, 'id' => 'injuries'])
        </div>
        <div class="form-group">
            <label for="treatment">Treatment</label>
            @textarea(['name' => 'treatment', 'value' => isset($incident) ? $incident->treatment : null, 'id' => 'treatment'])
        </div>
        <div class="form-group">
            <label for="photos">Photos</label>
            @input(['name' => 'photos', 'value' => isset($incident) ? $incident->photos : null, 'id' => 'photos'])
        </div>

        <div class="form-group">
            <label for="root_cause">Root Cause</label>
            @textarea(['name' => 'root_cause', 'value' => isset($incident) ? $incident->root_cause : null, 'id' => 'root_cause'])
        </div>

        <div class="form-group">
            <label for="corrective_actions">Corrective Actions</label>
            @textarea(['name' => 'corrective_actions', 'value' => isset($incident) ? $incident->corrective_actions : null, 'id' => 'corrective_actions'])
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Save</button>
</form>