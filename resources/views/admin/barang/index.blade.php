@extends('layouts.master')

@section('title', 'Data Barang')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Barang</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
            <a href="{{ route('admin.barang.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th style="min-width: 145px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->kode_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>Rp {{ number_format((float) $barang->harga, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada data barang. Silakan tambahkan barang pertama.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection