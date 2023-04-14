@extends('layouts.master')
@section('title', 'Halaman Rent Log')

@section('content')
<h4 class="d-inline">Log Peminjaman</h4>

<div class="mt-3">
    @if (session('alert-class'))
    <div class="alert {{ session('alert-class') }}">
        <b>{{ session('message') }}</b><br>
        {{ session('book') }}<br>
        {{ session('rent_date') }}<br>
        {{ session('return_date') }}<br>
        {{ session('date_now') }}<br>
        <a class="{{ session('penalty_status') }}">{{ session('penalty') }}</a><br>
    </div>
    @endif
</div>

<div class="mt-5">
    <x-rent-log-table :rentlog='$rentlogs' />
</div>
@endsection