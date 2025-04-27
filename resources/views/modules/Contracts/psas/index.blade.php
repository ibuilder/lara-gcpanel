@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>PSAs</h1>

        <a href="{{ route('psas.create') }}" class="btn btn-primary mb-3">Create PSA</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                </tbody>
        </table>
    </div>
@endsection