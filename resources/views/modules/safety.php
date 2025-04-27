<!-- This file contains views for the Safety module. -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Safety Module</h1>

    <div class="mb-4">
        <a href="{{ route('safety.create') }}" class="btn btn-primary">Add New Safety Record</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Observation</th>
                <th>PTP</th>
                <th>JHA</th>
                <th>Employee Orientation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($safetyRecords as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->observation }}</td>
                    <td>{{ $record->ptp }}</td>
                    <td>{{ $record->jha }}</td>
                    <td>{{ $record->employee_orientation }}</td>
                    <td>
                        <a href="{{ route('safety.edit', $record->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('safety.destroy', $record->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $safetyRecords->links() }}
</div>
@endsection

@section('scripts')
<script>
    // JavaScript for handling comments and exporting to PDF
    document.addEventListener('DOMContentLoaded', function() {
        // Add your JavaScript code here
    });
</script>
@endsection