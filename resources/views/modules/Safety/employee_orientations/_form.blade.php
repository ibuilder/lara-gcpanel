php
@php
    $method = isset($employeeOrientation) ? 'PUT' : 'POST';
    $action = isset($employeeOrientation) ? route('employee_orientations.update', $employeeOrientation->id) : route('employee_orientations.store');
@endphp

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@open(['url' => $action, 'method' => $method])
    @csrf

    <fieldset>
        <legend>Employee Information</legend>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'employee_name', 'label' => 'Employee Name', 'value' => isset($employeeOrientation) ? $employeeOrientation->employee_name : old('employee_name'), 'required' => true])
            </div>
            <div class="col-md-6">
                @input(['name' => 'employee_id', 'label' => 'Employee ID', 'value' => isset($employeeOrientation) ? $employeeOrientation->employee_id : old('employee_id')])
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Orientation Details</legend>
        <div class="row">
            <div class="col-md-4">
                @input(['name' => 'project', 'label' => 'Project', 'value' => isset($employeeOrientation) ? $employeeOrientation->project : old('project'), 'required' => true])
            </div>
            <div class="col-md-4">
                @input(['name' => 'location', 'label' => 'Location', 'value' => isset($employeeOrientation) ? $employeeOrientation->location : old('location')])
            </div>
            <div class="col-md-4">
                @input(['type' => 'date', 'name' => 'orientation_date', 'label' => 'Orientation Date', 'value' => isset($employeeOrientation) ? $employeeOrientation->orientation_date : old('orientation_date'), 'required' => true])
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'orientation_type', 'label' => 'Orientation Type', 'value' => isset($employeeOrientation) ? $employeeOrientation->orientation_type : old('orientation_type')])
            </div>
            <div class="col-md-6">
                @input(['name' => 'trainer', 'label' => 'Trainer', 'value' => isset($employeeOrientation) ? $employeeOrientation->trainer : old('trainer'), 'required' => true])
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Training Information</legend>
        <div class="row">
            <div class="col-md-12">
                @textarea(['name' => 'training_topics', 'label' => 'Training Topics', 'value' => isset($employeeOrientation) ? $employeeOrientation->training_topics : old('training_topics')])
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Final Details</legend>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'acknowledgement', 'label' => 'Acknowledgement', 'value' => isset($employeeOrientation) ? $employeeOrientation->acknowledgement : old('acknowledgement')])
            </div>
            <div class="col-md-6">
                @textarea(['name' => 'comments', 'label' => 'Comments', 'value' => isset($employeeOrientation) ? $employeeOrientation->comments : old('comments')])
            </div>
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>
@close