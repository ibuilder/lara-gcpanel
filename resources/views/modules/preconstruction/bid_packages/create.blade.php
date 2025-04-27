php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Bid Package</h1>

        <form action="{{ route('modules.preconstruction.bid_packages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="issue_date">Issue Date</label>
                <input type="date" name="issue_date" id="issue_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Bid Package</button>
        </form>
    </div>
@endsection