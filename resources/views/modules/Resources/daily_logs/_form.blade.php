blade
<form action="{{ isset($dailyLog) ? route('daily_logs.update', $dailyLog) : route('daily_logs.store') }}" method="POST">
    @csrf
    @if(isset($dailyLog))
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
        <legend>Daily Log Information</legend>

        <div class="form-group">
            <label for="project">Project</label>
            @select([
                'name' => 'project',
                'id' => 'project',
                'options' => $projects, // Assuming you're passing a $projects variable
                'selected' => isset($dailyLog) ? $dailyLog->project : null,
                'class' => 'form-control',
                'placeholder' => 'Select Project'
            ])
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            @input([
                'type' => 'date',
                'name' => 'date',
                'id' => 'date',
                'value' => isset($dailyLog) ? $dailyLog->date : old('date'),
                'class' => 'form-control',
                'required' => true
            ])
        </div>

        <div class="form-group">
            <label for="weather">Weather</label>
            @textarea([
                'name' => 'weather',
                'id' => 'weather',
                'value' => isset($dailyLog) ? $dailyLog->weather : old('weather'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>
    </fieldset>

    <fieldset>
        <legend>Work Details</legend>

        <div class="form-group">
            <label for="manpower">Manpower</label>
            @textarea([
                'name' => 'manpower',
                'id' => 'manpower',
                'value' => isset($dailyLog) ? $dailyLog->manpower : old('manpower'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>

        <div class="form-group">
            <label for="work_completed">Work Completed</label>
            @textarea([
                'name' => 'work_completed',
                'id' => 'work_completed',
                'value' => isset($dailyLog) ? $dailyLog->work_completed : old('work_completed'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>

        <div class="form-group">
            <label for="equipment_used">Equipment Used</label>
            @textarea([
                'name' => 'equipment_used',
                'id' => 'equipment_used',
                'value' => isset($dailyLog) ? $dailyLog->equipment_used : old('equipment_used'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>
    </fieldset>

    <fieldset>
        <legend>Project Status</legend>
        <div class="form-group">
            <label for="issues">Issues</label>
            @textarea([
                'name' => 'issues',
                'id' => 'issues',
                'value' => isset($dailyLog) ? $dailyLog->issues : old('issues'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>

        <div class="form-group">
            <label for="delays">Delays</label>
            @textarea([
                'name' => 'delays',
                'id' => 'delays',
                'value' => isset($dailyLog) ? $dailyLog->delays : old('delays'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>
        
        <div class="form-group">
            <label for="notes">Notes</label>
            @textarea([
                'name' => 'notes',
                'id' => 'notes',
                'value' => isset($dailyLog) ? $dailyLog->notes : old('notes'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>
    </fieldset>
        <fieldset>
            <legend>Safety, Visitors and Attachments</legend>
        <div class="form-group">
            <label for="safety_observations">Safety Observations</label>
            @textarea([
                'name' => 'safety_observations',
                'id' => 'safety_observations',
                'value' => isset($dailyLog) ? $dailyLog->safety_observations : old('safety_observations'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>

        <div class="form-group">
            <label for="visitors">Visitors</label>
            @textarea([
                'name' => 'visitors',
                'id' => 'visitors',
                'value' => isset($dailyLog) ? $dailyLog->visitors : old('visitors'),
                'class' => 'form-control',
                'rows' => 3
            ])
        </div>

        <div class="form-group">
            <label for="attachments">Attachments</label>
            @input([
                'type' => 'file',
                'name' => 'attachments[]',
                'id' => 'attachments',
                'class' => 'form-control',
                'multiple' => true
            ])
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Save</button>
</form>