@extends('layouts.app')

@section('title', 'Create Direct Cost')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Direct Cost</h1>
            @include('modules.Cost.direct_costs._form')
        </div>
    </div>
</div>
@endsection