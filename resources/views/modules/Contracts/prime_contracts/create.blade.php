@extends('layouts.app')

@section('title', 'Create Prime Contract')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Prime Contract</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @include('modules.Contracts.prime_contracts._form')
            </div>
        </div>
    </div>
@endsection