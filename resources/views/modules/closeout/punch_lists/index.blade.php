php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Punch Lists</h1>

        <a href="{{ route('modules.closeout.punch-lists.create') }}" class="btn btn-primary mb-3">Create New Punch List</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($punchLists as $punchList)
                    <tr>
                        <td>{{ $punchList->id }}</td>
                        <td>{{ $punchList->project->name }}</td>
                        <td>{{ $punchList->description }}</td>
                        <td>{{ $punchList->location }}</td>
                        <td>{{ $punchList->status }}</td>
                        <td>{{ $punchList->due_date }}</td>
                        <td>
                            <a href="{{ route('modules.closeout.punch-lists.edit', $punchList->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('modules.closeout.punch-lists.destroy', $punchList->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this punch list?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection