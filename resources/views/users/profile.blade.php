@extends('layouts.master')
@section('title', 'Profile')

@section('content')
<h4 class="d-inline">Log Peminjaman Buku</h4>
<div class="mt-3">
    <x-rent-log-table :rentlog='$rentlogs' />
</div>
@endsection