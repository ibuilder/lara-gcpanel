php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Change Order</h1>

        <form action="{{ route('modules.engineering.change-orders.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    <option value="">Select a Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control">
            </div>

            <div class="form-group">
                <label for="requested_by">Requested By</label>
                <input type="text" name="requested_by" id="requested_by" class="form-control">
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" name="cost" id="cost" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection