php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Role</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $role->description }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
@endsection