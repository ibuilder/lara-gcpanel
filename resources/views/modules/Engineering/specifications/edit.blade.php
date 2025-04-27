@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Specification</h1>

        <form method="POST" action="{{ route('specifications.update', $specification->id) }}">
            @csrf
            @method('PUT')

            @include('modules.Engineering.specifications._form')

            <button type="submit" class="btn btn-primary">Update Specification</button>
        </form>
    </div>
@endsection