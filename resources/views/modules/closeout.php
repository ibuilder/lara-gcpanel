<!-- This file contains views for the Closeout module. -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Closeout Module</h1>

    <div class="mb-3">
        <a href="{{ route('closeout.create') }}" class="btn btn-primary">Add New Record</a>
    </div>

    <table class="table table-striped" id="closeoutTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($closeouts as $closeout)
            <tr>
                <td>{{ $closeout->id }}</td>
                <td>{{ $closeout->title }}</td>
                <td>{{ $closeout->description }}</td>
                <td>{{ $closeout->status }}</td>
                <td>
                    <a href="{{ route('closeout.edit', $closeout->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('closeout.destroy', $closeout->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#closeoutTable').DataTable({
            "order": [[ 0, "asc" ]],
            "searching": true,
            "paging": true,
            "info": true
        });
    });
</script>
@endsection