@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manajamen Alat Camera </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Alat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section" style="min-height: 500px">
        <div class="row">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        Alat
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#basicModal">
                                Tambah Alat
                        </button>
                        <div class="dropdown" style="float: right;">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              Filter Kategori
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('admin.alat.index') }}">Semua</a></li>
                                @foreach ($categories as $cat)
                                <li><a class="dropdown-item" href="{{ route('admin.alat.index',['id'=>$cat->id]) }}">{{ $cat->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <form action="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" width="25%" placeholder="Cari Alat" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body" style="max-height: 500px; overflow:scroll;">
                        <div class="row row-cols-sm-3 row-cols-lg-4">
                            @foreach ($alats as $alat)
                            <div class="col-6">
                                <div class="card h-100">
                                    <img class="card-img-top" src="{{ url('') }}/images/{{ $alat->gambar }}" alt="">
                                    <div class="card-body">
                                        <span class="badge bg-warning">{{ $alat->category->nama_kategori }}</span>
                                        <h6 class="card-title">{{ $alat->nama_alat }}</h6>
                                        {{ formatToRupiah($alat->harga24) }}<span class="badge bg-light text-dark" style="float: right;">24 Jam</span>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('admin.alat.edit',['id'=>$alat->id]) }}" type="button" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></i></a>
                                        <a href="#data{{$alat->id}}" data-bs-toggle="modal"
                                            class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="data{{$alat->id}}"  tabindex="-1">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Hapus data</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        apakah anda yakin ingin menghapus <b>{{$alat->nama_alat}}</b>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST"
                                            action="{{route('admin.alat.destroy', $alat->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>&nbsp;&nbsp;Delete
                                            </button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- End Basic Modal-->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Basic Modal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.alat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Alat" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="kategori" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi singkat"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <span class="form-text mb-2">Harga ditulis angka saja, tidak perlu tanda titik</span>
                            <div class="col col-4"><input type="number" name="harga24" class="form-control" placeholder="Harga 24jam" required></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <span class="form-text">Upload Gambar Alat</span>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div><!-- End Basic Modal-->
</main>
@endsection
