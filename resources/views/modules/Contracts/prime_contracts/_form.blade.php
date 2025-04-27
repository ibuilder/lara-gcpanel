php
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
    $method = isset($primeContract) ? 'PUT' : 'POST';
    $action = isset($primeContract) ? route('prime_contracts.update', $primeContract->id) : route('prime_contracts.store');
@endphp
@open(['action' => $action, 'method' => $method, 'files' => true])
    @csrf
    <fieldset class="mb-3">
        <legend>Contract Details</legend>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'contract_number', 'label' => 'Contract Number', 'value' => old('contract_number', $primeContract->contract_number ?? ''), 'required' => true])
            </div>
            <div class="col-md-6">
                @select(['name' => 'project_id', 'label' => 'Project', 'options' => \App\Models\ProjectInfo::all()->pluck('name', 'id'), 'selected' => old('project_id', $primeContract->project_id ?? null)])
            </div>
        </div>
        <div class="mb-3">
            @textarea(['name' => 'description', 'label' => 'Description', 'value' => old('description', $primeContract->description ?? '')])
        </div>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'contractor', 'label' => 'Contractor', 'value' => old('contractor', $primeContract->contractor ?? '')])
            </div>
            <div class="col-md-6">
                @input(['name' => 'contract_value', 'label' => 'Contract Value', 'type' => 'number', 'value' => old('contract_value', $primeContract->contract_value ?? '')])
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @input(['name' => 'start_date', 'label' => 'Start Date', 'type' => 'date', 'value' => old('start_date', $primeContract->start_date ?? '')])
            </div>
            <div class="col-md-4">
                @input(['name' => 'end_date', 'label' => 'End Date', 'type' => 'date', 'value' => old('end_date', $primeContract->end_date ?? '')])
            </div>
            <div class="col-md-4">
                @input(['name' => 'date_executed', 'label' => 'Date Executed', 'type' => 'date', 'value' => old('date_executed', $primeContract->date_executed ?? '')])
            </div>
        </div>
    </fieldset>
    <fieldset class="mb-3">
        <legend>Financial Terms</legend>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'payment_terms', 'label' => 'Payment Terms', 'value' => old('payment_terms', $primeContract->payment_terms ?? '')])
            </div>
            <div class="col-md-6">
                @input(['name' => 'retention', 'label' => 'Retention', 'value' => old('retention', $primeContract->retention ?? '')])
            </div>
        </div>
    </fieldset>
    <fieldset class="mb-3">
        <legend>Additional Information</legend>
        <div class="mb-3">
            @input(['name' => 'file', 'label' => 'Contract File', 'type' => 'file'])
        </div>
        <div class="mb-3">
            @textarea(['name' => 'notes', 'label' => 'Notes', 'value' => old('notes', $primeContract->notes ?? '')])
        </div>
        <div class="mb-3">
            @select(['name' => 'status', 'label' => 'Status', 'options' => [
                'Draft' => 'Draft',
                'In Progress' => 'In Progress',
                'Completed' => 'Completed'
            ], 'selected' => old('status', $primeContract->status ?? 'Draft')])
        </div>
    </fieldset>
    
    
   
    <div class="mb-3">
     <button type="submit" class="btn btn-primary">Save</button>
    </div>

@close