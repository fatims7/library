@extends('layouts/main')


@section('title')

<div class="section-header d-flex justify-content-between">
    <h1>Dashboard</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="dashboard">dashboard</a></div>
    </div>
</div>

@endsection


@section('content')

    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex">
                        <i class="bi bi-journal-check rounded-start available"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">Total Buku</h5>
                        <p class="card-text">{{ $book_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex">
                        <i class="bi bi-journal-arrow-up rounded-start rent"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">Buku Tersedia</h5>
                        <p class="card-text">
                            {{ $book_available }}
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex">
                        <i class="bi bi-journal-arrow-up rounded-start rent"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">Buku Dipinjam</h5>
                        <p class="card-text">
                            {{ $book_rent }}
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex">
                        <i class="bi bi-journal-arrow-down rounded-start return"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">Stock Buku</h5>
                        <p class="card-text">
                            {{ $book_stock }}
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex">
                        <i class="bi bi-person-fill-check rounded-start users"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">Active Users</h5>
                        <p class="card-text">{{ $user_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection