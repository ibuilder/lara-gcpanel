@extends('layouts.app')

@section('title', 'Edit Coordination Issue')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('modules.BIM.coordination_issues._form')
        </div>
    </div>
</div>
@endsection