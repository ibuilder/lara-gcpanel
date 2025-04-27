php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>RFIs</h1>

        <a href="{{ route('modules.engineering.rfis.create') }}" class="btn btn-primary mb-3">Create RFI</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Name</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rfis as $rfi)
                    <tr>
                        <td>{{ $rfi->id }}</td>
                        <td>{{ $rfi->project->name }}</td>
                        <td>{{ $rfi->name }}</td>
                        <td>{{ $rfi->question }}</td>
                        <td>{{ $rfi->answer }}</td>
                        <td>{{ $rfi->status }}</td>
                        <td>{{ $rfi->due_date }}</td>
                        <td>
                            <a href="{{ route('modules.engineering.rfis.edit', $rfi) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('modules.engineering.rfis.destroy', $rfi) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this RFI?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection