php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bid Manuals</h1>

        <a href="{{ route('modules.preconstruction.bid_manual.create') }}" class="btn btn-primary mb-3">Create New Bid Manual</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Project Name</th>
                    <th>File Path</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bidManuals as $bidManual)
                    <tr>
                        <td>{{ $bidManual->id }}</td>
                        <td>{{ $bidManual->name }}</td>
                        <td>{{ $bidManual->description }}</td>
                        <td>{{ $bidManual->project->name }}</td>
                        <td>{{ $bidManual->file_path }}</td>
                        <td>
                            <a href="{{ route('modules.preconstruction.bid_manual.edit', $bidManual->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('modules.preconstruction.bid_manual.destroy', $bidManual->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this bid manual?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection