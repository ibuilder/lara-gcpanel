php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Company</h1>

        <form action="{{ route('settings.company_management.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection