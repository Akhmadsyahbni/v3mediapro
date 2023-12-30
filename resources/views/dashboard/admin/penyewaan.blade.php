@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manajamen Penyewaan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section" style="min-height: 500px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Kategori
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Invoice</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyewaan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $item->no_invoice }}
                                            @if ($item->status == 1)
                                                <span class="badge bg-warning">Perlu Ditinjau</span>
                                            @elseif ($item->status == 2)
                                                <span class="badge bg-info">Belum Bayar</span>
                                            @elseif ($item->status == 3)
                                                <span class="badge bg-success">Sudah Bayar</span>
                                            @elseif ($item->status == 4)
                                                <span class="badge bg-secondary">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>{{formatToRupiah($item->total)}} &nbsp; <span class="badge bg-secondary">{{ $item->order->count() }} Alat</span></td>
            
                                        <td>
                                            <a href="{{ route('admin.penyewaan.detail',['id' => $item->id]) }}" class="btn btn-outline-primary position-relative">
                                                Detail
                                                @if ($item->bukti != null && $item->status != 4 && $item->status != 3)
                                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                                    <span class="visually-hidden">bukti bayar</span>
                                                </span>
                                                @endif
                                            </a>
                                        </td>
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
@endsection