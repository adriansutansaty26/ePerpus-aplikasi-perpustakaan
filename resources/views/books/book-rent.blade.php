@extends('layouts.master')
@section('title', 'Catat Peminjaman Buku')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<div class="col-12 col-md-8 col-lg-6">
    <h4 class="d-inline">Catat Peminjaman Buku</h4>

    <div class="mt-3">
        @if (session('alert-class'))
        <div class="alert {{ session('alert-class') }}">
            {{ session('message1') }}<br>
            {{ session('message2') }}<br>
            {{ session('message3') }}
        </div>
        @endif
    </div>

    <form action="{{ route('book-rent.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="user" class="form-label">Username Peminjam</label>
            <select name="user_id" id="" class="form-control inputbox">
                <option value="">Pilih User</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="book" class="form-label">Buku Yang Dipinjam</label>
            <select name="book_id" id="" class="form-control inputbox">
                <option value="">Pilih Buku</option>
                @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Submit</button>
        </div>
    </form>
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.inputbox').select2();
    });
</script>
@endpush
@endsection