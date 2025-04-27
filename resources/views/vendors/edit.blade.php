php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Vendor</h1>

        <form action="{{ route('modules.vendors.update', $vendor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $vendor->name }}" required>
            </div>

            <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ $vendor->contact_person }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $vendor->phone }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $vendor->email }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $vendor->address }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Vendor</button>
        </form>
    </div>
@endsection