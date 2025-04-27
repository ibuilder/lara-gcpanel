php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Contract</h1>

        <form action="{{ route('modules.procurement.contracts.update', $contract->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project</label>
                <select class="form-control" id="project_id" name="project_id" required>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $contract->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="vendor">Vendor</label>
                <input type="text" class="form-control" id="vendor" name="vendor" value="{{ $contract->vendor }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $contract->description }}" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $contract->amount }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $contract->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $contract->end_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Contract</button>
        </form>
    </div>
@endsection