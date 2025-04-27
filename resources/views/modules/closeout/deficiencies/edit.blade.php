php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Deficiency</h1>

        <form action="{{ route('modules.closeout.deficiencies.update', $deficiency->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project</label>
                <select class="form-control" id="project_id" name="project_id" required>
                    <option value="">Select a project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $deficiency->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $deficiency->description }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $deficiency->location }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $deficiency->status }}">
            </div>

            <div class="form-group">
                <label for="reported_by">Reported By</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by" value="{{ $deficiency->reported_by }}">
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $deficiency->due_date }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Deficiency</button>
        </form>
    </div>
@endsection