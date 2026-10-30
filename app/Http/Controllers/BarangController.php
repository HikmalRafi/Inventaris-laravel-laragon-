<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            abort_unless(
                auth()->check() && auth()->user()->role === 'admin',
                403
            );

            return $next($request);
        });
    }

    // Menampilkan daftar barang
    public function index()
    {
        $data = Barang::orderBy('id', 'desc')->get();

        return view('admin.barang.index', compact('data'));
    }

    // Menampilkan form tambah barang
    public function create()
    {
        return view('admin.barang.tambah');
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => [
                'required',
                'string',
                'max:50',
                'unique:barang,kode_barang',
            ],
            'nama_barang' => ['required', 'string', 'max:100'],
            'kategori' => ['required', 'string', 'max:100'],
            'stok' => ['required', 'integer', 'min:0'],
            'harga' => ['required', 'numeric', 'min:0'],
        ]);

        Barang::create($validated);

        return redirect()
            ->route('admin.barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Barang $barang)
    {
        return view('admin.barang.edit', compact('barang'));
    }

    // Memperbarui barang
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => [
                'required',
                'string',
                'max:50',
                Rule::unique('barang', 'kode_barang')->ignore($barang->id),
            ],
            'nama_barang' => ['required', 'string', 'max:100'],
            'kategori' => ['required', 'string', 'max:100'],
            'stok' => ['required', 'integer', 'min:0'],
            'harga' => ['required', 'numeric', 'min:0'],
        ]);

        $barang->update($validated);

        return redirect()
            ->route('admin.barang.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus barang
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('admin.barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}