@extends('layouts.master')
@section('title', 'Manajemen User')

@section('content')
<h4 class="d-inline">Manajemen User</h4>

<div class="mt-3 d-flex">
    <a href="{{ route('users.registered') }}" class="btn btn-dark me-2"><i class="bi bi-person-bounding-box"></i> Permintaan Pendaftaran</a>
    <a href="{{ route('users.banned') }}" class="btn btn-outline-dark"><i class="bi bi-person-x-fill"></i> Lihat User Dihapus</a>
</div>

<div class="mt-5">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="mt-5">
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th>Username</th>
                <th>No. Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ ($data->phone == true ? $data->phone : '-') }}</td>
                <td>
                    <div class="d-flex">
                        <a href="/users/user-detail/{{ $data->slug }}" class="btn p-0 me-2"><i class="bi bi-eye-fill text-primary"></i></a>
                        <form method="POST" action="{{ route('users.delete', $data->slug) }}">
                            @csrf
                            @method('delete')
                            <button class="btn p-0" onclick="return confirm('Hapus User?')"><i class="bi bi-x-square-fill text-danger"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection