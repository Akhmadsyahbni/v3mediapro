@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Riwayat Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item">Riwayat Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section" style="min-height: 500px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <div class="alert alert-warning">Ini merupakan halaman yang menampilkan reservasi yang sudah selesai</div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Invoice</th>
                                    <th>User</th>
                                    <th>Total Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyewaan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $item->no_invoice }} <span class="badge bg-secondary">Selesai</span></td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{formatToRupiah($total->shift()) }}</td>
                                    {{-- <td> {{ $cat->alat->count() }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>