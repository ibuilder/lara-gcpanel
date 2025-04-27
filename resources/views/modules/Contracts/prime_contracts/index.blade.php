@extends('layouts.app')

@section('title', 'Prime Contracts')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4>Prime Contracts</h4>

                <a href="{{ route('prime_contracts.create') }}" class="btn btn-primary mb-3">Create New Prime Contract</a>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Contract Number</th>
                                <th>Description</th>
                                <th>Contractor</th>
                                <th>Contract Value</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($primeContracts as $primeContract)
                    <tr>
                            <td>{{ $primeContract->id }}</td>
                            <td>{{ $primeContract->contract_number }}</td>
                            <td>{{ $primeContract->description }}</td>
                            <td>{{ $primeContract->contractor }}</td>
                            <td>{{ $primeContract->contract_value }}</td>
                            <td>{{ $primeContract->start_date }}</td>
                            <td>{{ $primeContract->end_date }}</td>
                            <td>
                                <a href="{{ route('prime_contracts.edit', $primeContract->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('prime_contracts.destroy', $primeContract->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
