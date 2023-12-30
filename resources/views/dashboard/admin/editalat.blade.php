@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Edit Alat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"> Edit Data Alat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 600px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a class="link-dark" href="{{ route('admin.alat.index') }}"><i class="bi bi-arrow-left"></i>
                            Kembali</a> | Detail untuk Alat "{{ $alat->nama_alat }}"
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Alat</h5>
                        <form action="{{ route('admin.alat.update',['id' => $alat->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Nama Alat</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="nama" value="{{ $alat->nama_alat }}"
                                        required>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Kategori</label>
                                <div class="col-lg-6">
                                    <select name="kategori" class="form-control">
                                        @foreach ($kategori as $cat)
                                        <option value="{{ $cat->id }}" @if ($cat->id == $alat->category->id)
                                            selected="selected"
                                            @endif>{{ $cat->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Deskripsi</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="deskripsi"
                                        value="{{ $alat->deskripsi }}" required>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Harga 24Jam</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" value="{{ $alat->harga24 }}" name="harga24" class="form-control" placeholder="Harga 24jam" required>
                                        <span class="input-group-text"><b>/24jam</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Gambar</label>
                                <div class="col-lg-6">
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer" style="float: right">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Simpan
                                    </button>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="bi bi-arrow-counterclockwise"></i> Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
