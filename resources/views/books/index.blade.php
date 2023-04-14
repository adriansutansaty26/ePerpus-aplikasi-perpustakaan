@extends('layouts.master')
@section('title', 'Atur Buku')

@section('content')
<h4 class="d-inline">Atur Buku</h4>

<div class="mt-3 d-flex">
    <a href="{{ route('books.add') }}" class="btn btn-dark me-2"><i class="bi bi-plus-circle-fill"></i> Tambah Buku</a>
    <a href="{{ route('books.deleted') }}" class="btn btn-outline-dark"><i class="bi bi-archive-fill"></i> Lihat Buku Dihapus</a>
</div>

<div class="mt-5">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th>Cover</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $data->cover != null ? asset('storage/cover/'. $data->cover) : asset('images/image-not-found.jpg') }}" class="card-img-top" style="height: 50px; width: auto;" draggable="false">
                </td>
                <td>{{ $data->book_code }}</td>
                <td>{{ $data->title }}</td>
                <td>
                    @foreach ($data->categories as $item)
                    {{ $item->name }} <br>
                    @endforeach
                </td>
                <td>{{ $data->status == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                <td>
                    <div class="d-flex">
                        <form method="POST" action="{{ route('books.delete', $data->slug) }}">
                            <a href="{{ route('books.edit', $data->slug) }}" class="btn p-0 me-2"><i class="bi bi-pencil-square text-primary"></i></a>
                            @csrf
                            @method('delete')
                            <button class="btn p-0" onclick="return confirm('Hapus Buku?')"><i class="bi bi-x-square-fill text-danger"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection