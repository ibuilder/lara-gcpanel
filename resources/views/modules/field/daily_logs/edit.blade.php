php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Daily Log</h1>

        <form action="{{ route('modules.field.daily_logs.update', $dailyLog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $dailyLog->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $dailyLog->date }}" required>
            </div>

            <div class="form-group">
                <label for="weather">Weather</label>
                <input type="text" name="weather" id="weather" class="form-control" value="{{ $dailyLog->weather }}">
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-control">{{ $dailyLog->notes }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Daily Log</button>
        </form>
    </div>
@endsection