php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Submittal</h1>

        <form action="{{ route('modules.engineering.submittals.update', $submittal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $submittal->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $submittal->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $submittal->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $submittal->status }}">
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $submittal->due_date }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection