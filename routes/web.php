<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DataKaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/transaksi/pendapatan', [TransaksiController::class, 'index2'])->name('transaksi.masuk');
    Route::get('/transaksi/store', [TransaksiController::class, 'index2'])->name('transaksi.store');
    Route::get('/transaksi{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::get('/transaksi/pengeluaran', [TransaksiController::class, 'index'])->name('transaksi.keluar');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::get('/karyawan', [DataKaryawanController::class, 'index'])->name('karyawan.index');
    Route::post('/karyawan/store', [DataKaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/{id}/edit', [DataKaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/{id}', [DataKaryawanController::class, 'update'])->name('karyawan.update');
    Route::get('/profil/users-profile', [ProfilController::class, 'index'])->name('profil.index');
    Route::post('/profil/users-profile', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
    Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');
    Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('mitra.show');
    Route::get('/mitra/{id}/edit', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::put('/mitra/{id}', [MitraController::class, 'update'])->name('mitra.update');
    Route::get('produks', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('produks', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/charts-echarts', function () {
        return view('charts-echarts');
    });
});

require __DIR__.'/auth.php';


// Route::get('/login', [LoginController::class, 'index']);
// Route::get('/daftar', [DaftarController::class, 'index']);