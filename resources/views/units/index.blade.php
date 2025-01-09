@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Units</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Units</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('units.create') }}" class="btn btn-md btn-success mb-3">ADD UNIT</a>
            <div class="row">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th scope="col">NAME</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col" style="width:20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($units as $unit)
                        <tr>
                            <td>{{ $unit->name }}</td>
                            <td>{{ $unit->description }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('units.destroy', $unit->id) }}" method="POST">
                                    <a href="{{ route('units.show', $unit->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            No units available.
                        </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $units->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //message with sweetalert
    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "Berhasil",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "Gagal",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @endif
</script>
@endsection
