@extends('layouts.master')
@section('title', 'Halaman Kategori')

@section('content')
<h4 class="d-inline">Daftar Buku Dihapus</h4>

<div class="mt-5">
    <a href="{{ route('books.index') }}" class="btn btn-dark"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
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
                <th>Kode</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->book_code }}</td>
                <td>{{ $data->title }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('books.restore', $data->slug) }}" class="btn p-0 me-2"><i class="bi bi-arrow-counterclockwise text-primary"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection