@extends('layouts.app')

@section('title', 'Create Schedule')

@section('content')
    <div class="container">
        @include('modules.Field.schedules._form')
    </div>
@endsection