php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Vendors</h1>

        <a href="{{ route('settings.vendors.create') }}" class="btn btn-primary mb-3">Create New Vendor</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->id }}</td>
                        <td>{{ $vendor->name }}</td>
                        <td>{{ $vendor->contact_person }}</td>
                        <td>{{ $vendor->phone }}</td>
                        <td>{{ $vendor->email }}</td>
                        <td>{{ $vendor->address }}</td>
                        <td>
                            <a href="{{ route('settings.vendors.edit', $vendor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('settings.vendors.destroy', $vendor->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vendor?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection