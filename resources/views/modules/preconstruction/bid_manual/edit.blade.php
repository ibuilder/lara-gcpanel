php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Bid Manual</h1>

        <form action="{{ route('modules.preconstruction.bid_manual.update', $bidManual->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $bidManual->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $bidManual->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $bidManual->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="form-control-file">
                @if($bidManual->file_path)
                    <p>Current File: <a href="{{ asset('storage/' . $bidManual->file_path) }}" target="_blank">View</a></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection