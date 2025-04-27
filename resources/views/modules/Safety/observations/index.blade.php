@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Observations</h1>
        <a href="{{ route('observations.create') }}" class="btn btn-primary">Create Observation</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($observations as $observation)
                    <tr>
                        <td>{{ $observation->id }}</td>
                        <td>{{ $observation->title }}</td>
                        <td>
                            <a href="{{ route('observations.edit', $observation->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('observations.destroy', $observation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection