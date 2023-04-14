@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

<h4 class="d-inline">Dashboard</h4>

<div class="row mt-5">

    <div class="col-lg-4">
        <div class="card bg-dark p-3 mb-3 text-light">
            <div class="row">
                <div class="col-6">
                    <i class="bi bi-journal-bookmark h1"></i>
                </div>
                <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                    <div class="card-desc">
                        <h4 class="d-inline">Buku</h4>
                    </div>
                    <div class="card-count">{{ $bookCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card bg-light p-3 mb-3 text-dark">
            <div class="row">
                <div class="col-6">
                    <i class="bi bi-list-task h1"></i>
                </div>
                <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                    <div class="card-desc">
                        <h4 class="d-inline">Kategori</h4>
                    </div>
                    <div class="card-count">{{ $categoriCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card bg-light p-3 mb-3 text-dark">
            <div class="row">
                <div class="col-6">
                    <i class="bi bi-people h1"></i>
                </div>
                <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                    <div class="card-desc">
                        <h4 class="d-inline">User</h4>
                    </div>
                    <div class="card-count">{{ $userCount }}</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection