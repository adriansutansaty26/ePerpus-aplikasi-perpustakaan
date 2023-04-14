@extends('layouts.master')
@section('title', 'User Dihapus')

@section('content')
<h4 class="d-inline">User Dihapus</h4>

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
            @foreach ($bannedUser as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ ($data->phone == true ? $data->phone : '-') }}</td>
                <td>
                    <div class="d-flex">
                        <a href="/users/user-restore/{{ $data->slug }}" class="btn p-0 me-2"><i class="bi bi-arrow-counterclockwise text-primary"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection