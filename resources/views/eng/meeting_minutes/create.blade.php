blade
@extends('layouts.app')

@section('title', 'Create Meeting Minute')

@section('content')
    <div class="container">
        @include('eng.meeting_minutes._form')
    </div>
@endsection