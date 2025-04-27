php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Observations</h1>
        <a href="{{ route('modules.field.observations.create') }}" class="btn btn-primary mb-3">Create New Observation</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($observations as $observation)
                    <tr>
                        <td>{{ $observation->id }}</td>
                        <td>{{ $observation->project->name }}</td>
                        <td>{{ $observation->date }}</td>
                        <td>{{ $observation->description }}</td>
                        <td>{{ $observation->location }}</td>
                        <td>
                            <a href="{{ route('modules.field.observations.edit', $observation->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('modules.field.observations.destroy', $observation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection