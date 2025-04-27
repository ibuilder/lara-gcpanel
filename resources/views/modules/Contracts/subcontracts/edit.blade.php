@extends('layouts.app')

@section('title', 'Edit Subcontract')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4>Edit Subcontract</h4>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('modules.Contracts.subcontracts._form')
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
@endsection