@extends('layouts.master')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
        <a href="{{ route('admin.barang.index') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-boxes fa-sm text-white-50"></i>
            Kelola Barang
        </a>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Manajemen Inventaris
                    </div>
                    <div class="h5 mb-3 font-weight-bold text-gray-800">
                        Data Barang
                    </div>
                    <a href="{{ route('admin.barang.index') }}" class="btn btn-primary btn-sm">
                        Buka Data Barang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            Selamat datang, <strong>{{ auth()->user()->username }}</strong>.
            Gunakan menu Data Barang untuk menambah, mengedit,
            melihat, dan menghapus data inventaris.
        </div>
    </div>
@endsection