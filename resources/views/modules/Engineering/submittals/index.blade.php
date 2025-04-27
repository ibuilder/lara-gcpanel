php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Submittals</h1>

        <a href="{{ route('modules.engineering.submittals.create') }}" class="btn btn-primary mb-3">Create Submittal</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submittals as $submittal)
                    <tr>
                        <td>{{ $submittal->id }}</td>
                        <td>{{ $submittal->project->name }}</td>
                        <td>{{ $submittal->name }}</td>
                        <td>{{ $submittal->description }}</td>
                        <td>{{ $submittal->status }}</td>
                        <td>{{ $submittal->due_date }}</td>
                        <td>
                            <a href="{{ route('modules.engineering.submittals.edit', $submittal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('modules.engineering.submittals.destroy', $submittal->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this submittal?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection