blade
<form action="{{ isset($changeOrder) ? route('change_orders.update', $changeOrder) : route('change_orders.store') }}" method="POST">
    @csrf
    @if(isset($changeOrder))
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
        <legend>Change Order Information</legend>

        <div>
            <label for="change_order_number">Change Order Number</label>
            @input(['name' => 'change_order_number', 'value' => isset($changeOrder) ? $changeOrder->change_order_number : null])
        </div>

        <div>
            <label for="project">Project</label>
            @input(['name' => 'project', 'value' => isset($changeOrder) ? $changeOrder->project : null])
        </div>

        <div>
            <label for="date">Date</label>
            @input(['type' => 'date', 'name' => 'date', 'value' => isset($changeOrder) ? $changeOrder->date : null])
        </div>

        <div>
            <label for="amount">Amount</label>
            @input(['type' => 'number', 'name' => 'amount', 'value' => isset($changeOrder) ? $changeOrder->amount : null])
        </div>

         <div>
            <label for="vendor">Vendor</label>
            @input(['name' => 'vendor', 'value' => isset($changeOrder) ? $changeOrder->vendor : null])
        </div>

        <div>
            <label for="status">Status</label>
            @select(['name' => 'status', 'options' => ['Draft' => 'Draft', 'Submitted' => 'Submitted', 'Approved' => 'Approved', 'Rejected' => 'Rejected'], 'selected' => isset($changeOrder) ? $changeOrder->status : null])
        </div>
    </fieldset>

    <fieldset>
        <legend>Details</legend>

        <div>
            <label for="description">Description</label>
            @textarea(['name' => 'description', 'value' => isset($changeOrder) ? $changeOrder->description : null])
        </div>

        <div>
            <label for="reason">Reason</label>
            @textarea(['name' => 'reason', 'value' => isset($changeOrder) ? $changeOrder->reason : null])
        </div>

         <div>
            <label for="notes">Notes</label>
            @textarea(['name' => 'notes', 'value' => isset($changeOrder) ? $changeOrder->notes : null])
        </div>
        <div>
            <label for="attachments">Attachments</label>
            @input(['name' => 'attachments', 'type' => 'file'])
        </div>
    </fieldset>

    <button type="submit">Save</button>
</form>