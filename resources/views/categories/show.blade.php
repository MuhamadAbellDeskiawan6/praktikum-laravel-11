@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Kategori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategori</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $category->id }}</p>
            <p><strong>Nama:</strong> {{ $category->name }}</p>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
