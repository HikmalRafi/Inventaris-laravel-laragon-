@extends('layouts.master')

@section('title', 'Edit Barang')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Barang</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" id="kode_barang" name="kode_barang" class="form-control"
                        value="{{ old('kode_barang', $barang->kode_barang) }}" maxlength="50" required>
                </div>

                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="form-control"
                        value="{{ old('nama_barang', $barang->nama_barang) }}" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" class="form-control"
                        value="{{ old('kategori', $barang->kategori) }}" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}"
                        min="0" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" class="form-control"
                        value="{{ old('harga', $barang->harga) }}" min="0" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>

                <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection