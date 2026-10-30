<?php
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

Route::get('/', [LoginController::class, 'showLogin'])
    ->name('login');

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login.page');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/admin', [AdminController::class, 'admin'])
    ->middleware('auth')
    ->name('admin.beranda');

Route::get('/kasir', function () {
    abort_unless(auth()->user()->role === 'kasir', 403);

    return view('kasir.beranda');
})->middleware('auth')->name('kasir.beranda');

Route::middleware('auth')->group(function () {
    Route::get('/admin/barang', [BarangController::class, 'index'])
        ->name('admin.barang.index');

    Route::get('/admin/barang/tambah', [BarangController::class, 'create'])
        ->name('admin.barang.create');

    Route::post('/admin/barang', [BarangController::class, 'store'])
        ->name('admin.barang.store');

    Route::get('/admin/barang/{barang}/edit', [BarangController::class, 'edit'])
        ->name('admin.barang.edit');

    Route::put('/admin/barang/{barang}', [BarangController::class, 'update'])
        ->name('admin.barang.update');

    Route::delete('/admin/barang/{barang}', [BarangController::class, 'destroy'])
        ->name('admin.barang.destroy');
});
