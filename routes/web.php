<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;

Route::view('/login', 'Auth.login')->name('login')->middleware('guest');

Route::middleware("auth")->group(function () {
   Route::post('/logout', [AuthController::class, "logout"])->name('logout');
   Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

   Route::resource('/buku', BukuController::class);
   Route::resource('/anggota', AnggotaController::class);


   Route::view('/dashboard/sirkulasi', 'Dashboard.sirkulasi')->name('sirkulasi');
   Route::view('/dashboard/sirkulasi/create', 'Form.createSirkulasi')->name('sirkulasi.create');

   Route::view('/dashboard/log-data/peminjaman', 'Dashboard.Log Data.peminjaman')->name('log.peminjaman');
   Route::view('/dashboard/log-data/pengembalian', 'Dashboard.Log Data.pengembalian')->name('log.pengembalian');

   Route::view('/dashboard/laporan-sirkulasi', 'Dashboard.laporanSirkulasi')->name('laporan.sirkulasi');

   Route::resource('/pengguna', PenggunaController::class);
   Route::view('/dashboard/pengguna-sistem', 'Dashboard.penggunaSistem')->name('pengguna.sistem');
   Route::view('/dashboard/pengguna-sistem/create', 'Form.createPengguna')->name('create.pengguna');
   Route::view('/dashboard/pengguna-sistem/update', 'Form.updatePengguna')->name('update.pengguna');
});
