@extends('layouts.master')
@section('title', 'Atur Kategori')

@section('content')
<h4 class="d-inline">Atur Kategori</h4>

<div class="mt-3 d-flex">
    <a href="{{ route('category.add') }}" class="btn btn-dark me-2"><i class="bi bi-plus-circle-fill"></i> Tambah Kategori</a>
    <a href="{{ route('category.deleted') }}" class="btn btn-outline-dark"><i class="bi bi-archive-fill"></i> Lihat Kategori Dihapus</a>
</div>

<div class="mt-3">
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
            @foreach ($categories as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('category.edit', $data->slug) }}" class="btn p-0 me-2"><i class="bi bi-pencil-square text-primary"></i></a>
                        <form method="POST" action="{{ route('category.delete', $data->slug) }}">
                            @csrf
                            @method('delete')
                            <button class="btn p-0" onclick="return confirm('Hapus Kategori?')"><i class="bi bi-x-square-fill text-danger"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection