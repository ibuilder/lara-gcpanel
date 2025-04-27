php
@extends('layouts.app')

@section('title', 'COIs')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>COIs</h4>
                    <a href="{{ route('cois.create') }}" class="btn btn-primary">Create New COI</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection