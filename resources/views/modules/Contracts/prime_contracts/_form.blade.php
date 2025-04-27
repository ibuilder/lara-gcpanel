php
@php
    $method = isset($primeContract) ? 'PUT' : 'POST';
    $action = isset($primeContract) ? route('prime_contracts.update', $primeContract->id) : route('prime_contracts.store');
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $primeContract->name ?? '') }}" required>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input type="text" class="form-control" id="number" name="number" value="{{ old('number', $primeContract->number ?? '') }}">
        @error('number')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

        <div class="mb-3">
            <label for="date_executed" class="form-label">Date Executed</label>
            <input type="date" class="form-control" id="date_executed" name="date_executed" value="{{ old('date_executed', $primeContract->date_executed ?? '') }}">
            @error('date_executed')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $primeContract->start_date ?? '') }}">
        @error('start_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="completion_date" class="form-label">Completion Date</label>
        <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{ old('completion_date', $primeContract->completion_date ?? '') }}">
        @error('completion_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="value" class="form-label">Value</label>
        <input type="number" class="form-control" id="value" name="value" value="{{ old('value', $primeContract->value ?? '') }}">
        @error('value')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="project_id" class="form-label">Project</label>
        <select class="form-control" id="project_id" name="project_id">
            @foreach(\App\Models\ProjectInfo::all() as $project)
                <option value="{{ $project->id }}" {{ (isset($primeContract) && $primeContract->project_id == $project->id) ? 'selected' : '' }}>{{ $project->name }}</option>
            @endforeach
        </select>
        @error('project_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="file" class="form-label">Contract File</label>
        <input type="file" class="form-control" id="file" name="file">
        @error('file')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>