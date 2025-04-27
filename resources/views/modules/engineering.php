<!-- This file contains views for the Engineering module section of the gcPanel application. -->

<!-- View for Request for Information (RFIs) -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Request for Information (RFIs)</h1>
    <a href="{{ route('rfis.create') }}" class="btn btn-primary">Create RFI</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rfis as $rfi)
            <tr>
                <td>{{ $rfi->id }}</td>
                <td>{{ $rfi->title }}</td>
                <td>{{ $rfi->status }}</td>
                <td>
                    <a href="{{ route('rfis.edit', $rfi->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('rfis.destroy', $rfi->id) }}" method="POST" style="display:inline;">
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
@endsection

<!-- View for Submittals -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submittals</h1>
    <a href="{{ route('submittals.create') }}" class="btn btn-primary">Create Submittal</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submittals as $submittal)
            <tr>
                <td>{{ $submittal->id }}</td>
                <td>{{ $submittal->title }}</td>
                <td>{{ $submittal->status }}</td>
                <td>
                    <a href="{{ route('submittals.edit', $submittal->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('submittals.destroy', $submittal->id) }}" method="POST" style="display:inline;">
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
@endsection

<!-- View for Drawings -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Drawings</h1>
    <a href="{{ route('drawings.create') }}" class="btn btn-primary">Upload Drawing</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drawings as $drawing)
            <tr>
                <td>{{ $drawing->id }}</td>
                <td>{{ $drawing->title }}</td>
                <td>{{ $drawing->status }}</td>
                <td>
                    <a href="{{ route('drawings.edit', $drawing->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('drawings.destroy', $drawing->id) }}" method="POST" style="display:inline;">
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
@endsection

<!-- View for Specifications -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Specifications</h1>
    <a href="{{ route('specifications.create') }}" class="btn btn-primary">Create Specification</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specifications as $specification)
            <tr>
                <td>{{ $specification->id }}</td>
                <td>{{ $specification->title }}</td>
                <td>{{ $specification->status }}</td>
                <td>
                    <a href="{{ route('specifications.edit', $specification->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('specifications.destroy', $specification->id) }}" method="POST" style="display:inline;">
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
@endsection

<!-- View for File Explorer -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>File Explorer</h1>
    <input type="file" id="file-upload" class="form-control">
    <button class="btn btn-primary" onclick="uploadFile()">Upload</button>
    <div id="file-list" class="mt-3"></div>
</div>

<script>
function uploadFile() {
    // Implement file upload logic
}
</script>
@endsection

<!-- View for Permitting -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Permitting</h1>
    <a href="{{ route('permits.create') }}" class="btn btn-primary">Create Permit</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permits as $permit)
            <tr>
                <td>{{ $permit->id }}</td>
                <td>{{ $permit->title }}</td>
                <td>{{ $permit->status }}</td>
                <td>
                    <a href="{{ route('permits.edit', $permit->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('permits.destroy', $permit->id) }}" method="POST" style="display:inline;">
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
@endsection

<!-- View for Meeting Agenda/Minutes -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Meeting Agenda/Minutes</h1>
    <a href="{{ route('meetings.create') }}" class="btn btn-primary">Create Meeting</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meetings as $meeting)
            <tr>
                <td>{{ $meeting->id }}</td>
                <td>{{ $meeting->title }}</td>
                <td>{{ $meeting->status }}</td>
                <td>
                    <a href="{{ route('meetings.edit', $meeting->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display:inline;">
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
@endsection

<!-- View for Transmittals -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transmittals</h1>
    <a href="{{ route('transmittals.create') }}" class="btn btn-primary">Create Transmittal</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transmittals as $transmittal)
            <tr>
                <td>{{ $transmittal->id }}</td>
                <td>{{ $transmittal->title }}</td>
                <td>{{ $transmittal->status }}</td>
                <td>
                    <a href="{{ route('transmittals.edit', $transmittal->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('transmittals.destroy', $transmittal->id) }}" method="POST" style="display:inline;">
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
@endsection