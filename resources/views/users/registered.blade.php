@extends('layouts.master')
@section('title', 'Permintaan Pendaftaran')

@section('content')

<h4 class="d-inline">Permintaan Pendaftaran</h4>


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
            @foreach ($registered as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ ($data->phone == true ? $data->phone : '-') }}</td>
                <td>
                    <div class="d-flex">
                        <a href="/users/user-detail/{{ $data->slug }}" class="btn btn-primary">Detail</a>&nbsp;
                        <a href="{{ route('users.approve', $data->username ) }}" class="btn btn-success">Aktivasi User</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection