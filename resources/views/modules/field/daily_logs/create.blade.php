php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Daily Log</h1>

        <form action="{{ route('modules.field.daily_logs.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    <option value="">Select a project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="weather">Weather</label>
                <input type="text" name="weather" id="weather" class="form-control">
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Daily Log</button>
        </form>
    </div>
@endsection