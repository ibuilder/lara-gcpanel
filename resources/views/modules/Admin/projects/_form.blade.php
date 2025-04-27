blade
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($project) ? route('projects.update', $project) : route('projects.store') }}" method="POST">
        @csrf
        @if(isset($project))
            @method('PUT')
        @endif
        <fieldset>
            <legend>Project Information</legend>
            <div class="form-group">
                <label for="project_name">Project Name</label>
                @input(['name' => 'project_name', 'value' => isset($project) ? $project->project_name : null, 'id' => 'project_name'])
            </div>
            <div class="form-group">
                <label for="project_number">Project Number</label>
                @input(['name' => 'project_number', 'value' => isset($project) ? $project->project_number : null, 'id' => 'project_number'])
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                @textarea(['name' => 'description', 'value' => isset($project) ? $project->description : null, 'id' => 'description'])
            </div>
        </fieldset>
        <fieldset>
            <legend>Contacts</legend>
            <div class="form-group">
                <label for="client">Client</label>
                @input(['name' => 'client', 'value' => isset($project) ? $project->client : null, 'id' => 'client'])
            </div>
            <div class="form-group">
                <label for="project_manager">Project Manager</label>
                @input(['name' => 'project_manager', 'value' => isset($project) ? $project->project_manager : null, 'id' => 'project_manager'])
            </div>
            <div class="form-group">
                <label for="superintendent">Superintendent</label>
                @input(['name' => 'superintendent', 'value' => isset($project) ? $project->superintendent : null, 'id' => 'superintendent'])
            </div>
        </fieldset>
        <fieldset>
            <legend>Dates</legend>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                @input(['type' => 'date', 'name' => 'start_date', 'value' => isset($project) ? $project->start_date : null, 'id' => 'start_date'])
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                @input(['type' => 'date', 'name' => 'end_date', 'value' => isset($project) ? $project->end_date : null, 'id' => 'end_date'])
            </div>
        </fieldset>
        <fieldset>
            <legend>Address</legend>
            <div class="form-group">
                <label for="address">Address</label>
                @input(['name' => 'address', 'value' => isset($project) ? $project->address : null, 'id' => 'address'])
            </div>
            <div class="form-group">
                <label for="city">City</label>
                @input(['name' => 'city', 'value' => isset($project) ? $project->city : null, 'id' => 'city'])
            </div>
            <div class="form-group">
                <label for="state">State</label>
                @input(['name' => 'state', 'value' => isset($project) ? $project->state : null, 'id' => 'state'])
            </div>
            <div class="form-group">
                <label for="zip">Zip</label>
                @input(['name' => 'zip', 'value' => isset($project) ? $project->zip : null, 'id' => 'zip'])
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>