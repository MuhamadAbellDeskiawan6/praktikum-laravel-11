@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Customers</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Customers</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('customers.create') }}" class="btn btn-md btn-success mb-3">ADD CUSTOMER</a>
            <div class="row">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th scope="col">NIK</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col" style="width:20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->nik }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->telp }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->alamat }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Are you sure?');" action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No customers available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $customers->links() }}
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
        title: "SUCCESS",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "FAILED!",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @endif
</script>
@endsection
