@extends('layouts.app')

@section('title', 'Edit Daily Report')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @include('modules.Field.daily_reports._form')
    <button type="submit" class="btn btn-primary">Update</button>
</div>
@endsection