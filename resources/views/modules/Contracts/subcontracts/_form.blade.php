@php
    $method = isset($subcontract) ? 'PUT' : 'POST';
    $action = isset($subcontract) ? route('subcontracts.update', $subcontract->id) : route('subcontracts.store');
@endphp

@open(['route' => $action, 'method' => $method, 'files' => true])
    @csrf

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
        <legend>Subcontract Information</legend>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'subcontract_number', 'label' => 'Subcontract Number', 'value' => old('subcontract_number', isset($subcontract) ? $subcontract->subcontract_number : null)])
            </div>
            <div class="col-md-6">
                @select(['name' => 'prime_contract_id', 'label' => 'Prime Contract', 'options' => $primeContracts, 'value' => old('prime_contract_id', isset($subcontract) ? $subcontract->prime_contract_id : null), 'option_value' => 'id', 'option_label' => 'contract_number'])
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @select(['name' => 'vendor_id', 'label' => 'Vendor', 'options' => $vendors, 'value' => old('vendor_id', isset($subcontract) ? $subcontract->vendor_id : null), 'option_value' => 'id', 'option_label' => 'name'])
            </div>
            <div class="col-md-6">
                @input(['name' => 'description', 'label' => 'Description', 'value' => old('description', isset($subcontract) ? $subcontract->description : null)])
            </div>
        </div>

        <div class="row">
             <div class="col-md-6">
                @input(['name' => 'amount', 'label' => 'Amount', 'type' => 'number', 'value' => old('amount', isset($subcontract) ? $subcontract->amount : null)])
            </div>
           <div class="col-md-6">
               @select(['name' => 'status', 'label' => 'Status', 'options' => ['Draft' => 'Draft', 'In Review' => 'In Review', 'Approved' => 'Approved', 'Executed' => 'Executed'], 'value' => old('status', isset($subcontract) ? $subcontract->status : 'Draft')])
           </div>
        </div>

    </fieldset>

    <fieldset>
        <legend>Dates</legend>
        <div class="row">
            <div class="col-md-4">
                @input(['name' => 'start_date', 'label' => 'Start Date', 'type' => 'date', 'value' => old('start_date', isset($subcontract) ? $subcontract->start_date : null)])
            </div>
            <div class="col-md-4">
                @input(['name' => 'end_date', 'label' => 'End Date', 'type' => 'date', 'value' => old('end_date', isset($subcontract) ? $subcontract->end_date : null)])
            </div>
            <div class="col-md-4">
                @input(['name' => 'date_executed', 'label' => 'Date Executed', 'type' => 'date', 'value' => old('date_executed', isset($subcontract) ? $subcontract->date_executed : null)])
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Financial Terms</legend>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'payment_terms', 'label' => 'Payment Terms', 'value' => old('payment_terms', isset($subcontract) ? $subcontract->payment_terms : null)])
            </div>
            <div class="col-md-6">
                @input(['name' => 'retention', 'label' => 'Retention', 'value' => old('retention', isset($subcontract) ? $subcontract->retention : null)])
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Additional Information</legend>
        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'subcontract_file', 'label' => 'Subcontract File', 'type' => 'file'])
            </div>
             <div class="col-md-6">
                 @input(['name' => 'notes', 'label' => 'Notes', 'type' => 'textarea', 'value' => old('notes', isset($subcontract) ? $subcontract->notes : null)])
             </div>
        </div>

    </fieldset>


    <div class="row">

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
@close