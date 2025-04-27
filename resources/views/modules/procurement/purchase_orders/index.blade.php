php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Purchase Orders</h1>

        <a href="{{ route('modules.procurement.purchase-orders.create') }}" class="btn btn-primary mb-3">Create New Purchase Order</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Vendor</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Issue Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchaseOrders as $purchaseOrder)
                    <tr>
                        <td>{{ $purchaseOrder->id }}</td>
                        <td>{{ $purchaseOrder->project->name }}</td>
                        <td>{{ $purchaseOrder->vendor }}</td>
                        <td>{{ $purchaseOrder->description }}</td>
                        <td>{{ $purchaseOrder->amount }}</td>
                        <td>{{ $purchaseOrder->issue_date }}</td>
                        <td>
                            <a href="{{ route('modules.procurement.purchase-orders.edit', $purchaseOrder->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('modules.procurement.purchase-orders.destroy', $purchaseOrder->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this purchase order?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection