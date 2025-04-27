php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bid Packages</h1>

        <a href="{{ route('modules.preconstruction.bid_packages.create') }}" class="btn btn-primary mb-3">Create New Bid Package</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Project Name</th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidPackages as $bidPackage)
                    <tr>
                        <td>{{ $bidPackage->id }}</td>
                        <td>{{ $bidPackage->name }}</td>
                        <td>{{ $bidPackage->description }}</td>
                        <td>{{ $bidPackage->project->name }}</td>
                        <td>{{ $bidPackage->issue_date }}</td>
                        <td>{{ $bidPackage->due_date }}</td>
                        <td>
                            <a href="{{ route('modules.preconstruction.bid_packages.edit', $bidPackage->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('modules.preconstruction.bid_packages.destroy', $bidPackage->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this bid package?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection