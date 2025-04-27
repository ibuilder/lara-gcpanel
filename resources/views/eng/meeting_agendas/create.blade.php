@extends('layouts.app')

@section('title', 'Create Meeting Agenda')

@section('content')
    <div class="container">
        <h1>Create Meeting Agenda</h1>

        <div>
            @include('eng.meeting_agendas._form')
        </div>
    </div>
@endsection
