@extends('layouts.master')
@section('title', 'Detail User')

@section('content')
<h4 class="d-inline">Detail User</h4>

<div class="mt-3">
    @if($user->status == 'inactive')
    <a href="{{ route('users.approve', $user->slug ) }}" class="btn btn-info">Approve User</a>
    @endif
</div>

<div class="mt-3">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="my-5 w-25">
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" readonly value="{{ $user->username }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">No. Telp</label>
        <input type="text" class="form-control" readonly value="{{ $user->phone }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Alamat</label>
        <textarea type="text" class="form-control" rows="5" cols="30" style="resize:none;" readonly>{{ $user->address }}</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Status</label>
        <input type="text" class="form-control" readonly value="{{ $user->status }}">
    </div>
</div>

<div class="mt-5">
    <h4 class="pb-2">Log Peminjaman milik {{ $user->username }}</h4>
    <x-rent-log-table :rentlog='$rentlogs' />
</div>

@endsection