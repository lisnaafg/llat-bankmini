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
Route::get('/users', [UserController::class, 'index'])->name('users.index');  // Show all users
Route::get('/users/create', [UserController::class, 'tambahUser'])->name('users.create');  // Show user creation form
Route::post('/users', [UserController::class, 'simpanUser'])->name('users.store');  // Store new user
Route::get('/users/{id}/hapus', [UserController::class, 'hapusUser'])->name('users.delete');
Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('users.edit');
Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('users.update');


// transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'tambahTrans'])->name('transaksi.create');  // Show form to create transaksi
Route::post('/transaksi/cari', [TransaksiController::class, 'cariNasabah'])->name('transaksi.cari');  // Route to search for nasabah
Route::post('/transaksi', [TransaksiController::class, 'simpanTrans'])->name('transaksi.store');  // Store transaksi
Route::get('/transaksi/{id}/hapus', [TransaksiController::class,'hapusTrans'])->name('transaksi.delete');
Route::get('/transaksi/{id}/edit', [TransaksiController::class,'editTrans'])->name('transaksi.edit');


// Nasabah
Route::get('/nasabah', [LaporanController::class, 'halamanNasabah'])->name('nasabah.index');
// Route::get('/nasabah/laporan', [LaporanController::class,'laporanNasabah'])->name('nasabah.laporan');
// Route::get('/nasabah/laporan/cetak', [LaporanController::class,'cetakLaporan'])->name('nasabah.cetak');
// Route::get('/admin/laporan', [LaporanController::class,'laporanTransaksiAdmin'])->name('admin.laporan');
// Route::get('/admin/laporan/cetak', [LaporanController::class,'cetakLaporanAdmin'])->name('admin.cetak');


// Route::get('/admin/laporan/{id}/cetak', [LaporanController::class,'cetakLaporanPilih'])->name('admin.laporan.cetak.pilih');
