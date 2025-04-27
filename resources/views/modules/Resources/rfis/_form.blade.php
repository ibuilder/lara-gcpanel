blade
<form action="{{ isset($rfi) ? route('rfis.update', $rfi) : route('rfis.store') }}" method="POST">
    @csrf
    @if(isset($rfi))
        @method('PUT')
    @endif

    <fieldset>
        <legend>RFI Information</legend>

        <div>
            @input(['name' => 'rfi_number', 'label' => 'RFI Number', 'value' => isset($rfi) ? $rfi->rfi_number : null])
            @error('rfi_number')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'project', 'label' => 'Project', 'value' => isset($rfi) ? $rfi->project : null])
            @error('project')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'location', 'label' => 'Location', 'value' => isset($rfi) ? $rfi->location : null])
            @error('location')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'date', 'label' => 'Date', 'type' => 'date', 'value' => isset($rfi) ? $rfi->date : null])
            @error('date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'subject', 'label' => 'Subject', 'value' => isset($rfi) ? $rfi->subject : null])
            @error('subject')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            @textarea(['name' => 'question', 'label' => 'Question', 'value' => isset($rfi) ? $rfi->question : null])
            @error('question')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @select(['name' => 'priority', 'label' => 'Priority', 'options' => ['High' => 'High', 'Medium' => 'Medium', 'Low' => 'Low'], 'value' => isset($rfi) ? $rfi->priority : null])
            @error('priority')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @select(['name' => 'status', 'label' => 'Status', 'options' => ['Open' => 'Open', 'Draft' => 'Draft', 'Submitted' => 'Submitted', 'Closed' => 'Closed'], 'value' => isset($rfi) ? $rfi->status : null])
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'from', 'label' => 'From', 'value' => isset($rfi) ? $rfi->from : null])
            @error('from')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'to', 'label' => 'To', 'value' => isset($rfi) ? $rfi->to : null])
            @error('to')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'attachments', 'label' => 'Attachments', 'value' => isset($rfi) ? $rfi->attachments : null])
            @error('attachments')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            @input(['name' => 'due_date', 'label' => 'Due Date', 'type' => 'date', 'value' => isset($rfi) ? $rfi->due_date : null])
            @error('due_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </fieldset>
    <button type="submit">Save</button>
</form>