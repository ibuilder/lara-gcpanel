@extends('layouts.app')

@section('title', 'Create Daily Report')

@section('content')
    <div class="container">
        <div>
            @include('modules.Field.daily_reports._form')
        </div>
    </div>
@endsection
