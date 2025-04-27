php
@extends('layouts.app')

@section('content')
    <h1>Budget Forecasts</h1>

    <a href="{{ route('budget_forecasts.create') }}" class="btn btn-primary mb-3">Create Budget Forecast</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($budgetForecasts as $budgetForecast)
                <tr>
                    <td>{{ $budgetForecast->id }}</td>
                    <td>{{ $budgetForecast->name }}</td>
                    <td>
                        <a href="{{ route('budget_forecasts.show', $budgetForecast->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('budget_forecasts.edit', $budgetForecast->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('budget_forecasts.destroy', $budgetForecast->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No budget forecasts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection