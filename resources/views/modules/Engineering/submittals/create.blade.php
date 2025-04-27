@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Submittal</h1>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('submittals.store') }}" method="POST">
                    @csrf
                    @include('modules.Engineering.submittals._form')
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection