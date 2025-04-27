<!-- This file contains views for the Cost module in the gcPanel application. -->

<!-- cost/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cost Module</h1>
    <a href="{{ route('cost.create') }}" class="btn btn-primary">Add New Cost Entry</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($costs as $cost)
            <tr>
                <td>{{ $cost->id }}</td>
                <td>{{ $cost->description }}</td>
                <td>{{ $cost->amount }}</td>
                <td>{{ $cost->status }}</td>
                <td>
                    <a href="{{ route('cost.edit', $cost->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cost.destroy', $cost->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!-- cost/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Cost Entry</h1>
    <form action="{{ route('cost.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection

<!-- cost/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Cost Entry</h1>
    <form action="{{ route('cost.update', $cost->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $cost->description }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $cost->amount }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="pending" {{ $cost->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $cost->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $cost->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

<!-- cost/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cost Entry Details</h1>
    <p><strong>ID:</strong> {{ $cost->id }}</p>
    <p><strong>Description:</strong> {{ $cost->description }}</p>
    <p><strong>Amount:</strong> {{ $cost->amount }}</p>
    <p><strong>Status:</strong> {{ $cost->status }}</p>
    <a href="{{ route('cost.edit', $cost->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('cost.destroy', $cost->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection