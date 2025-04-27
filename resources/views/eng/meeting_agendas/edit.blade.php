blade
@extends('layouts.app')

@section('title', 'Edit Meeting Agenda')

@section('content')
    <div class="container">
        @include('eng.meeting_agendas._form')
    </div>
@endsection