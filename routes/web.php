<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporan', [LaporanController::class, 'halamanNasabah'])->middleware('auth');

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'tambahUser'])->name('users.create');
Route::post('/users', [UserController::class, 'simpanUser'])->name('users.store');
Route::get('/users/{id}/hapus', [UserController::class, 'hapusUser'])->name('users.delete');
Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('users.edit');
Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('users.update');


// transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'tambahTrans'])->name('transaksi.create');
Route::post('/transaksi/cari', [TransaksiController::class, 'cariNasabah'])->name('transaksi.cari');
Route::post('/transaksi', [TransaksiController::class, 'simpanTrans'])->name('transaksi.store');
Route::get('/transaksi/{id}/hapus', [TransaksiController::class,'hapusTrans'])->name('transaksi.delete');
Route::get('/transaksi/{id}/edit', [TransaksiController::class,'editTrans'])->name('transaksi.edit');


// Nasabah
Route::get('/nasabah', [LaporanController::class, 'halamanNasabah'])->name('nasabah.index');
Route::get('/nasabah/laporan', [LaporanController::class,'laporanNasabah'])->name('nasabah.laporan');
Route::get('/nasabah/laporan/cetak', [LaporanController::class,'cetakLaporan'])->name('nasabah.cetak');
Route::get('/admin/laporan', [LaporanController::class,'laporanTransaksiAdmin'])->name('admin.laporan');
// Update transaksi
Route::put('/transaksi/{id}/update', [TransaksiController::class, 'updateTrans'])->name('transaksi.update');
Route::get('/admin/laporan/cetak', [LaporanController::class,'cetakLaporanAdmin'])->name('admin.cetak');


Route::get('/admin/laporan/cetak/{id}', [LaporanController::class, 'cetakLaporanPilih'])->name('admin.laporan.cetak.pilih');
// Example for showing a specific nasabah's details (by ID)
Route::get('/nasabah/{id}', [NasabahController::class, 'detailNasabah'])->name('nasabah.detail');

