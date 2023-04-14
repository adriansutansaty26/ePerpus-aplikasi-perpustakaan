@extends('layouts.master')
@section('title', 'Tambah Kategori')

@section('content')
<h4 class="d-inline">Tambah Kategori</h4>

<div class="mt-3 d-flex">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="pt-2">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mt-3">
            <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Tambahkan Kategori</button>
        </div>
    </form>
</div>
@endsection