php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Change Order</h1>

        <form action="{{ route('modules.engineering.change_orders.update', $changeOrder->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $changeOrder->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $changeOrder->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $changeOrder->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $changeOrder->status }}">
            </div>

            <div class="form-group">
                <label for="requested_by">Requested By</label>
                <input type="text" name="requested_by" id="requested_by" class="form-control" value="{{ $changeOrder->requested_by }}">
            </div>

            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" name="cost" id="cost" class="form-control" value="{{ $changeOrder->cost }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Change Order</button>
        </form>
    </div>
@endsection