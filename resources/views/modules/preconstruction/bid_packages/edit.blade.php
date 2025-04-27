php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Bid Package</h1>

        <form action="{{ route('modules.preconstruction.bid_packages.update', $bidPackage->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $bidPackage->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $bidPackage->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id', $bidPackage->project_id) == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="issue_date">Issue Date</label>
                <input type="date" name="issue_date" id="issue_date" class="form-control" value="{{ old('issue_date', $bidPackage->issue_date) }}" required>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $bidPackage->due_date) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Bid Package</button>
        </form>
    </div>
@endsection