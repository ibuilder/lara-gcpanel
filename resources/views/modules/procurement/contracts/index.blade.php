php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contracts</h1>
        <a href="{{ route('modules.procurement.contracts.create') }}" class="btn btn-primary mb-3">Create New Contract</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Vendor</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{ $contract->id }}</td>
                        <td>{{ $contract->project->name }}</td>
                        <td>{{ $contract->vendor }}</td>
                        <td>{{ $contract->description }}</td>
                        <td>{{ $contract->amount }}</td>
                        <td>{{ $contract->start_date }}</td>
                        <td>{{ $contract->end_date }}</td>
                        <td>
                            <a href="{{ route('modules.procurement.contracts.edit', $contract->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('modules.procurement.contracts.destroy', $contract->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contract?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection