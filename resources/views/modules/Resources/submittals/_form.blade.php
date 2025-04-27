blade
<form action="{{ isset($submittal) ? route('submittals.update', $submittal) : route('submittals.store') }}" method="POST">
    @csrf
    @if(isset($submittal))
        @method('PUT')
    @endif

    <fieldset>
        <legend>Submittal Information</legend>
        
        <div>
            @input(['name' => 'submittal_number', 'label' => 'Submittal Number', 'value' => isset($submittal) ? $submittal->submittal_number : null])
        </div>
        
        <div>
            @select(['name' => 'project_id', 'label' => 'Project', 'options' => $projects, 'selected' => isset($submittal) ? $submittal->project_id : null])
        </div>
        
        <div>
            @input(['name' => 'discipline', 'label' => 'Discipline', 'value' => isset($submittal) ? $submittal->discipline : null])
        </div>
        
        <div>
            @input(['name' => 'specification_section', 'label' => 'Specification Section', 'value' => isset($submittal) ? $submittal->specification_section : null])
        </div>

        <div>
            @textarea(['name' => 'submittal_description', 'label' => 'Submittal Description', 'value' => isset($submittal) ? $submittal->submittal_description : null])
        </div>
        
        <div>
            @input(['name' => 'vendor', 'label' => 'Vendor', 'value' => isset($submittal) ? $submittal->vendor : null])
        </div>

        <div>
            @select(['name' => 'status', 'label' => 'Status', 'options' => ['Open', 'Pending', 'Approved', 'Rejected'], 'selected' => isset($submittal) ? $submittal->status : null])
        </div>

        <div>
            @input(['type' => 'date', 'name' => 'date_submitted', 'label' => 'Date Submitted', 'value' => isset($submittal) ? $submittal->date_submitted : null])
        </div>

        <div>
            @input(['type' => 'date', 'name' => 'date_returned', 'label' => 'Date Returned', 'value' => isset($submittal) ? $submittal->date_returned : null])
        </div>

        <div>
             @input(['name' => 'attachments', 'label' => 'Attachments', 'value' => isset($submittal) ? $submittal->attachments : null])
        </div>

        <div>
            @textarea(['name' => 'notes', 'label' => 'Notes', 'value' => isset($submittal) ? $submittal->notes : null])
        </div>
    </fieldset>

    <button type="submit">Save</button>
</form>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif