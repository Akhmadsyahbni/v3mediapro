@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard" style="min-height: 500px">
        <div class="row">
            <div class="col-xxl-3 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Data Penyewaan<span></span></h5>
                        <h4>{{ $total_penyewaan }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small link-dark stretched-link" href="{{ route('admin.penyewaan.index') }}">Kelola Penyewaan</a>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Data Alat<span></span></h5>
                        <h4>{{ $total_alat }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small link-dark stretched-link" href="{{ route('admin.penyewaan.index') }}">Kelola Penyewaan</a>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kategori<span></span></h5>
                        <h4>{{ $total_kategori }}</h4>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small link-dark stretched-link" href="{{ route('admin.penyewaan.index') }}">Kelola Penyewaan</a>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
