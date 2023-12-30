@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manajamen Kategori</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Kategori Alat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section" style="min-height: 500px">
        <div class="row">
            <div class="col-lg-6">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tambah Kategori
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Kategori Baru"
                                    required>
                            </div>
                            <button type="submit" name="tambah"
                                class="btn btn-primary d-flex fa-pull-right">Tambah</button></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
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
                                    <th>Kategori</th>
                                    <th>Jumlah Alat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cat->nama_kategori }}</td>
                                    <td> {{ $cat->alat->count() }}</td>
                                    <td>
                                        <a href="{{ route('admin.kategori.edit',['id'=>$cat->id]) }}" type="button"
                                            class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></i></a>
                                        {{-- <form action="{{ route('admin.kategori.destroy',['id'=>$cat->id]) }}"
                                        method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="javascript: return confirm('Anda yakin akan menghapus alat ini?');"><i
                                                class="bi bi-trash"></i></a>
                                            </form> --}}
                                            <a href="#data{{$cat->id}}" data-bs-toggle="modal"
                                                class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                    </td>
                                </tr>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="data{{$cat->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus <b>{{$cat->nama_kategori}}</b>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST"
                                                    action="{{ route('admin.kategori.destroy', ['id' => $cat->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value="{{ $cat->id }}">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i>&nbsp;&nbsp;Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
