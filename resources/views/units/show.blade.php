@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Unit</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/units">Units</a></li>
        <li class="breadcrumb-item active">Detail Unit</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="font-weight-bold">Name:</h5>
            <p>{{ $unit->name }}</p>

            <h5 class="font-weight-bold">Description:</h5>
            <p>{{ $unit->description }}</p>

            <a href="{{ route('units.index') }}" class="btn btn-md btn-primary">Back to Units</a>
        </div>
    </div>
</div>
@endsection
