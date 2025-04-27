php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manpower Logs</h1>

        <a href="{{ route('modules.field.manpower_logs.create') }}" class="btn btn-primary mb-3">Create New Manpower Log</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Date</th>
                    <th>Trade</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manpowerLogs as $manpowerLog)
                    <tr>
                        <td>{{ $manpowerLog->id }}</td>
                        <td>{{ $manpowerLog->project->name }}</td>
                        <td>{{ $manpowerLog->date }}</td>
                        <td>{{ $manpowerLog->trade }}</td>
                        <td>{{ $manpowerLog->quantity }}</td>
                        <td>
                            <a href="{{ route('modules.field.manpower_logs.edit', $manpowerLog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('modules.field.manpower_logs.destroy', $manpowerLog->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this manpower log?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection