@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Change Order</h1>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('change_orders.store') }}" method="POST">
                    @csrf
                    @include('modules.Cost.change_orders._form')
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection