<form action="{{ isset($approvalDirective) ? route('approval_directives.update', $approvalDirective) : route('approval_directives.store') }}" method="POST">
    @csrf
    @if(isset($approvalDirective))
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
        <legend>Approval Directive Details</legend>

        <div class="form-group">
            @input(['name' => 'directive_number', 'label' => 'Directive Number', 'value' => isset($approvalDirective) ? $approvalDirective->directive_number : null])
        </div>

        <div class="form-group">
            @input(['name' => 'project', 'label' => 'Project', 'value' => isset($approvalDirective) ? $approvalDirective->project : null])
        </div>

        <div class="form-group">
            @input(['name' => 'date', 'label' => 'Date', 'type' => 'date', 'value' => isset($approvalDirective) ? $approvalDirective->date : null])
        </div>

        <div class="form-group">
            @textarea(['name' => 'description', 'label' => 'Description', 'value' => isset($approvalDirective) ? $approvalDirective->description : null])
        </div>

        <div class="form-group">
            @input(['name' => 'amount', 'label' => 'Amount', 'type' => 'number', 'value' => isset($approvalDirective) ? $approvalDirective->amount : null])
        </div>

        <div class="form-group">
            @input(['name' => 'vendor', 'label' => 'Vendor', 'value' => isset($approvalDirective) ? $approvalDirective->vendor : null])
        </div>

        <div class="form-group">
            @select(['name' => 'status', 'label' => 'Status', 'options' => ['Pending' => 'Pending', 'Approved' => 'Approved', 'Rejected' => 'Rejected'], 'value' => isset($approvalDirective) ? $approvalDirective->status : null])
        </div>

        <div class="form-group">
            @input(['name' => 'approved_by', 'label' => 'Approved By', 'value' => isset($approvalDirective) ? $approvalDirective->approved_by : null])
        </div>

        <div class="form-group">
            @textarea(['name' => 'notes', 'label' => 'Notes', 'value' => isset($approvalDirective) ? $approvalDirective->notes : null])
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Save</button>
</form>