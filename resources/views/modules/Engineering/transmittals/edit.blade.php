php
@extends('layouts.app')

@section('content')
    <h1>Edit Transmittal</h1>

    <form action="{{ route('transmittals.update', $transmittal->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('modules.Engineering.transmittals._form')

        <button type="submit">Update</button>
    </form>
@endsection