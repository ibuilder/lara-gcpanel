php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create RFI</h1>

        <form action="{{ route('modules.engineering.rfis.store') }}" method="POST">
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
                <label for="question">Question</label>
                <textarea name="question" id="question" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control">
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create RFI</button>
        </form>
    </div>
@endsection