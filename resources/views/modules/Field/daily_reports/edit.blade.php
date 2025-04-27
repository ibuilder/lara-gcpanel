blade
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Daily Report</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('daily_reports.update', $dailyReport->id) }}">
            @csrf
            @method('PUT')

            @include('modules.Field.daily_reports._form')

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection