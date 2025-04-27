php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit RFI</h1>

        <form action="{{ route('modules.engineering.rfis.update', $rfi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $rfi->project_id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $rfi->name }}" required>
            </div>

            <div class="form-group">
                <label for="question">Question</label>
                <textarea name="question" id="question" class="form-control" required>{{ $rfi->question }}</textarea>
            </div>

            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" class="form-control" required>{{ $rfi->answer }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $rfi->status }}">
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $rfi->due_date }}">
            </div>

            <button type="submit" class="btn btn-primary">Update RFI</button>
        </form>
    </div>
@endsection