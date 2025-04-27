php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Qualified Bidders</h1>

        <a href="{{ route('modules.preconstruction.qualified_bidders.create') }}" class="btn btn-primary mb-3">Create New Qualified Bidder</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Trade</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($qualifiedBidders as $bidder)
                <tr>
                    <td>{{ $bidder->id }}</td>
                    <td>{{ $bidder->name }}</td>
                    <td>{{ $bidder->contact_person }}</td>
                    <td>{{ $bidder->phone }}</td>
                    <td>{{ $bidder->email }}</td>
                    <td>{{ $bidder->trade }}</td>
                    <td>{{ $bidder->address }}</td>
                    <td>
                        <a href="{{ route('modules.preconstruction.qualified_bidders.edit', $bidder->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('modules.preconstruction.qualified_bidders.destroy', $bidder->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this qualified bidder?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection