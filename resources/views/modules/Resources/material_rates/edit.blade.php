@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Material Rate</h1>

        <form action="{{ route('material_rates.update', $materialRate->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('modules.Resources.material_rates._form')

            <button type="submit" class="btn btn-primary">Update Material Rate</button>
        </form>
    </div>
@endsection