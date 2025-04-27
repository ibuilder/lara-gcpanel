php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Deficiencies</h1>

        <a href="{{ route('modules.closeout.deficiencies.create') }}" class="btn btn-primary mb-3">Create New Deficiency</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Reported By</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deficiencies as $deficiency)
                    <tr>
                        <td>{{ $deficiency->id }}</td>
                        <td>{{ $deficiency->project->name }}</td>
                        <td>{{ $deficiency->description }}</td>
                        <td>{{ $deficiency->location }}</td>
                        <td>{{ $deficiency->status }}</td>
                        <td>{{ $deficiency->reported_by }}</td>
                        <td>{{ $deficiency->due_date }}</td>
                        <td>
                            <a href="{{ route('modules.closeout.deficiencies.edit', $deficiency->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('modules.closeout.deficiencies.destroy', $deficiency->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this deficiency?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection