blade
@extends('layouts.app')

@section('title', 'Meeting Agendas')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Meeting Agendas</h4>
                    <a href="{{ route('meeting_agendas.create') }}" class="btn btn-primary">Create New Meeting Agenda</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection