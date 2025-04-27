@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Subcontract</h1>

        <form action="{{ route('subcontracts.update', $subcontract->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="subcontractor_name">Subcontractor Name:</label>
                <input type="text" class="form-control" id="subcontractor_name" name="subcontractor_name" value="{{ old('subcontractor_name', $subcontract->subcontractor_name) }}">
                @error('subcontractor_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
<div class="form-group">
                <label for="subcontract_amount">Subcontract Amount:</label>
                <input type="number" class="form-control" id="subcontract_amount" name="subcontract_amount" value="{{ old('subcontract_amount', $subcontract->subcontract_amount) }}">
                @error('subcontract_amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $subcontract->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection