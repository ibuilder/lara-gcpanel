php
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Change Orders
                        <a href="{{ route('modules.engineering.change-orders.create') }}" class="btn btn-primary float-right">Create Change Order</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Requested By</th>
                                    <th>Cost</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($changeOrders as $changeOrder)
                                    <tr>
                                        <td>{{ $changeOrder->id }}</td>
                                        <td>{{ $changeOrder->project->name }}</td>
                                        <td>{{ $changeOrder->name }}</td>
                                        <td>{{ $changeOrder->description }}</td>
                                        <td>{{ $changeOrder->status }}</td>
                                        <td>{{ $changeOrder->requested_by }}</td>
                                        <td>{{ $changeOrder->cost }}</td>
                                        <td>
                                            <a href="{{ route('modules.engineering.change-orders.edit', $changeOrder->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('modules.engineering.change-orders.destroy', $changeOrder->id) }}" method="POST" style="display: inline;">
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
                </div>
            </div>
        </div>
    </div>
@endsection