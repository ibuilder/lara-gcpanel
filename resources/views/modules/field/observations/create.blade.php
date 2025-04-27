php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Observation</h1>

        <form action="{{ route('modules.field.observations.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>
                <select name="project_id" id="project_id" class="form-select" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection