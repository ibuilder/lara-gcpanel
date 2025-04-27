<!-- This file contains views for the Preconstruction module section. -->

<!-- Qualified Bidders View -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Qualified Bidders</h1>
    <a href="{{ route('qualified-bidders.create') }}" class="btn btn-primary">Add Qualified Bidder</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($qualifiedBidders as $bidder)
            <tr>
                <td>{{ $bidder->name }}</td>
                <td>{{ $bidder->status }}</td>
                <td>
                    <a href="{{ route('qualified-bidders.edit', $bidder->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('qualified-bidders.destroy', $bidder->id) }}" method="POST" style="display:inline;">
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

<!-- Bid Packages View -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bid Packages</h1>
    <a href="{{ route('bid-packages.create') }}" class="btn btn-primary">Add Bid Package</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bidPackages as $package)
            <tr>
                <td>{{ $package->name }}</td>
                <td>{{ $package->status }}</td>
                <td>
                    <a href="{{ route('bid-packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('bid-packages.destroy', $package->id) }}" method="POST" style="display:inline;">
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

<!-- Bid Manual View -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bid Manual</h1>
    <a href="{{ route('bid-manuals.create') }}" class="btn btn-primary">Add Bid Manual</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Manual Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bidManuals as $manual)
            <tr>
                <td>{{ $manual->title }}</td>
                <td>{{ $manual->status }}</td>
                <td>
                    <a href="{{ route('bid-manuals.edit', $manual->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('bid-manuals.destroy', $manual->id) }}" method="POST" style="display:inline;">
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