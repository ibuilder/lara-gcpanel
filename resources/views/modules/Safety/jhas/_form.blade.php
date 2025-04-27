@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $method = isset($jha) ? 'PUT' : 'POST';
    $action = isset($jha) ? route('safety.jhas.update', $jha->id) : route('safety.jhas.store');
@endphp

@open(['url' => $action, 'method' => $method])
    @csrf
    @if(isset($jha))
        @method('PUT')
    @endif
    <fieldset>
        <legend>JHA Information</legend>
        <div class="form-group">
            @input(['name' => 'name', 'label' => 'JHA Name', 'value' => isset($jha) ? $jha->name : null, 'required' => true])
        </div>
        <div class="form-group">
            @select(['name' => 'project_id', 'label' => 'Project', 'options' => \App\Models\ProjectInfo::pluck('name', 'id'), 'value' => isset($jha) ? $jha->project_id : null, 'required' => true])
        </div>
        <div class="form-group">
            @input(['name' => 'location', 'label' => 'Location', 'value' => isset($jha) ? $jha->location : null, 'required' => true])
        </div>
        <div class="form-group">
            @input(['name' => 'date', 'label' => 'Date', 'type' => 'date', 'value' => isset($jha) ? $jha->date : null, 'required' => true])
        </div>
        <div class="form-group">
            @input(['name' => 'supervisor', 'label' => 'Supervisor', 'value' => isset($jha) ? $jha->supervisor : null, 'required' => true])
        </div>
    </fieldset>

    <fieldset>
        <legend>Task Details</legend>
        <div class="form-group">
            @textarea(['name' => 'task_description', 'label' => 'Task Description', 'value' => isset($jha) ? $jha->task_description : null, 'required' => true])
        </div>
        <div class="form-group">
            @textarea(['name' => 'potential_hazards', 'label' => 'Potential Hazards', 'value' => isset($jha) ? $jha->potential_hazards : null, 'required' => true])
        </div>
        <div class="form-group">
            @select(['name' => 'risk_level', 'label' => 'Risk Level', 'options' => ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], 'value' => isset($jha) ? $jha->risk_level : null, 'required' => true])
        </div>
        <div class="form-group">
            @textarea(['name' => 'controls', 'label' => 'Controls', 'value' => isset($jha) ? $jha->controls : null, 'required' => true])
        </div>
    </fieldset>

    <fieldset>
        <legend>Safety Requirements</legend>
        <div class="form-group">
            @textarea(['name' => 'ppe_required', 'label' => 'PPE Required', 'value' => isset($jha) ? $jha->ppe_required : null, 'required' => true])
        </div>
        <div class="form-group">
            @textarea(['name' => 'equipment_required', 'label' => 'Equipment Required', 'value' => isset($jha) ? $jha->equipment_required : null, 'required' => true])
        </div>
    </fieldset>

    <fieldset>
        <legend>Approval</legend>
        <div class="form-group">
            @select(['name' => 'approval_status', 'label' => 'Approval', 'options' => ['Pending' => 'Pending', 'Approved' => 'Approved', 'Rejected' => 'Rejected'], 'value' => isset($jha) ? $jha->approval_status : 'Pending', 'required' => true])
        </div>
    </fieldset>
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
@close()


