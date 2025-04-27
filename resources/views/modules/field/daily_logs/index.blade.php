php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daily Logs</h1>

        <a href="{{ route('modules.field.daily-logs.create') }}" class="btn btn-primary mb-3">Create New Daily Log</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Date</th>
                    <th>Weather</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dailyLogs as $dailyLog)
                    <tr>
                        <td>{{ $dailyLog->id }}</td>
                        <td>{{ $dailyLog->project->name }}</td>
                        <td>{{ $dailyLog->date }}</td>
                        <td>{{ $dailyLog->weather }}</td>
                        <td>{{ $dailyLog->notes }}</td>
                        <td>
                            <a href="{{ route('modules.field.daily-logs.edit', $dailyLog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('modules.field.daily-logs.destroy', $dailyLog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this daily log?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection