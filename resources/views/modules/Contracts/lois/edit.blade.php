php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit LOI</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lois.update', $loi->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('modules.Contracts.lois._form')

            <button type="submit" class="btn btn-primary">Update LOI</button>
        </form>
    </div>
@endsection