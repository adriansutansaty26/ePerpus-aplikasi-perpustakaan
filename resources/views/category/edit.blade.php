@extends('layouts.master')
@section('title', 'Halaman Kategori')

@section('content')
<h4 class="d-inline">Edit Kategori</h4>

<div class="mt-3 w-50">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('category.update', $category->slug ) }}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="mt-3">
            <button class="btn btn-success"><i class="bi bi-pencil-square text-light"></i> Simpan </button>
        </div>
    </form>
</div>
@endsection