@open(['model' => $invoicing, 'store' => 'invoicings.store', 'update' => 'invoicings.update'])
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
        <legend>Invoice Information</legend>

        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'invoice_number', 'label' => 'Invoice Number', 'value' => old('invoice_number', $invoicing->invoice_number ?? '')])
            </div>

            <div class="col-md-6">
                @select(['name' => 'project_id', 'label' => 'Project', 'options' => $projects, 'value' => old('project_id', $invoicing->project_id ?? '')])
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'vendor', 'label' => 'Vendor', 'value' => old('vendor', $invoicing->vendor ?? '')])
            </div>
            <div class="col-md-6">
                @input(['name' => 'amount', 'label' => 'Amount', 'type' => 'number', 'value' => old('amount', $invoicing->amount ?? '')])
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @input(['name' => 'date', 'label' => 'Date', 'type' => 'date', 'value' => old('date', $invoicing->date ?? '')])
            </div>
            <div class="col-md-6">
                @input(['name' => 'due_date', 'label' => 'Due Date', 'type' => 'date', 'value' => old('due_date', $invoicing->due_date ?? '')])
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @select(['name' => 'status', 'label' => 'Status', 'options' => ['Draft', 'Submitted', 'Approved', 'Paid'], 'value' => old('status', $invoicing->status ?? '')])
            </div>
            <div class="col-md-6">
                @input(['name' => 'invoice_file', 'label' => 'Invoice File', 'type' => 'file'])
            </div>
        </div>
        @input(['name' => 'notes', 'label' => 'Notes', 'value' => old('notes', $invoicing->notes ?? '')])
    </fieldset>

    <fieldset>
        <legend>Payment Information</legend>
        @input(['name' => 'payment_information', 'label' => 'Payment Information', 'value' => old('payment_information', $invoicing->payment_information ?? '')])
    </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>
@close