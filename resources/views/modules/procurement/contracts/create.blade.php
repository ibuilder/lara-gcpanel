php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Contract</h1>

        <form action="{{ route('modules.procurement.contracts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    <option value="">Select Project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="vendor">Vendor</label>
                <input type="text" name="vendor" id="vendor" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('modules.procurement.contracts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection