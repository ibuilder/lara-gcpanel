@extends('layouts.app')

@section('title', 'Create Approval Directive')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('modules.Cost.approval_directives._form')
            </div>
        </div>
    </div>
@endsection