@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Customer</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>NIK:</strong> {{ $customer->nik }}</p>
            <p><strong>Name:</strong> {{ $customer->name }}</p>
            <p><strong>Phone:</strong> {{ $customer->telp }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Address:</strong> {{ $customer->alamat }}</p>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
        </div>
    </div>
</div>
@endsection
