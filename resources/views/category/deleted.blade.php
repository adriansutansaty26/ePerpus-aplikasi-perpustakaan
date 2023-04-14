@extends('layouts.master')
@section('title', 'Daftar Kategori Dihapus')

@section('content')
<h4 class="d-inline">Daftar Kategori Dihapus</h4>

<div class="mt-5">
    <a href="{{ route('category.index') }}" class="btn btn-dark"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
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
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deleted as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('category.restore', $data->slug) }}" class="btn p-0 me-2"><i class="bi bi-arrow-counterclockwise text-primary"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection