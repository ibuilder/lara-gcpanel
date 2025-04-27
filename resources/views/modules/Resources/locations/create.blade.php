blade
@extends('layouts.app')

@section('title', 'Create Location')

@section('content')
    <div class="container">
        @include('modules.Resources.locations._form')
    </div>
@endsection