@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Pembayaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 600px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a class="link-dark" href="{{ route('admin.penyewaan.index') }}"><i class="bi bi-arrow-left"></i>
                            Kembali</a>
                    </div>

                    <div class="card-body">
                        <tbody>
                            <tr>
                                <th>No. Invoice</th>
                                <td>{{ $detail->first()->payment->no_invoice }}</td>
                            </tr>
                            <tr>
                                <th>Penyewa</th>
                                <td><b>{{ $detail->first()->user->name }}</b> ({{ $detail->first()->user->email }})</td>
                            </tr>
                        </tbody>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Alat</th>
                                    <th>Harga</th>
                                    {{-- <th>Total</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('admin.acc',['paymentId' => $detail->first()->payment->id]) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    @foreach($detail as $key => $item)
                                    <tr class="{{ ($item->status == 3) ? 'table-danger' : '' }}">
                                        @if ($status == 1)
                                        <input type="checkbox" name="order[]" class="form-check-input"
                                            value="{{ $item->id }}">
                                        @endif
                                        <td>
                                            <a class="" class="link">{{ $item->alat->nama_alat }}</a>
                                            <span
                                                class="badge bg-warning">{{ $item->alat->category->nama_kategori }}</span>

                                        </td>
                                        <td>
                                            {{formatToRupiah($item->harga)}}
                                        </td>
                                        {{-- <td>
                                            <b>{{formatToRupiah($total)}}</b>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td style=""><b>{{formatToRupiah($total)}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($status == 1)
                                            <button type="submit" class="btn btn-success">Acc</a>
                                                @endif
                                        </td>
                                        <td></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                        @if ($status == 1 || $status == 2)
                        <form action=""
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                onclick="javascript: return confirm('Anda yakin akan membatalkan reservasi?');"
                                class="btn btn-danger mb-3">Cancel Reservasi</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection
