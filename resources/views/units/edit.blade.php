@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Unit</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/units">Units</a></li>
        <li class="breadcrumb-item active">Edit Unit</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('units.update', $unit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $unit->name) }}" placeholder="Enter Unit Name">
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Enter Unit Description">{{ old('description', $unit->description) }}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
</div>
@endsection
