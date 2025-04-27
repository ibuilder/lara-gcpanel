@extends('layouts.app')

@section('title', 'Create Invoicing')

@section('content')
    <div class="container">
        <div>
            @include('modules.Cost.invoicings._form')
        </div>
    </div>
@endsection