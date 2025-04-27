blade
@extends('layouts.app')

@section('title', 'Edit Lien Waiver')

@section('content')
    <div class="container">
        @include('modules.Contracts.lien_waivers._form')
    </div>
@endsection