@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add Customer</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
        <li class="breadcrumb-item active">Add Customer</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="font-weight-bold">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" placeholder="Enter Customer NIK">
                    @error('nik')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Customer Name">
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Phone</label>
                    <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" placeholder="Enter Customer Phone">
                    @error('telp')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Customer Email">
                    @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Address</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Enter Customer Address">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
            </form>
        </div>
    </div>
</div>
@endsection
