@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Prime Contract</h1>

        <form action="{{ route('prime_contracts.store') }}" method="POST">
            @csrf
            @include('modules.Contracts.prime_contracts._form')

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection