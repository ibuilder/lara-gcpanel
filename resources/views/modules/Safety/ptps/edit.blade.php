@extends('layouts.app')

@section('title', 'Edit PTP')

@section('content')
    <div class="container">
        <h1>Edit PTP</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('modules.Safety.ptps._form')

        <button type="submit" class="btn btn-primary">Update</button>
    </div>
@endsection