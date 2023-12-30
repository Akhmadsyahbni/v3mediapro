@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Edit Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"> Edit Data Kategori</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 600px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit {{ $kategori->nama_kategori }} </h5>
                        <form action="{{ route('admin.kategori.update',['id'=>$kategori->id]) }}" method="POST" autocomplete="off">
                            @method('patch')
                            @csrf
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Kategori</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama" class="form-control"
                                        value="{{$kategori->nama_kategori}}">
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