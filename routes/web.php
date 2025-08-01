<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::view('/login', 'Auth.login')->name('login');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::view('/dashboard/kelola-data/buku', 'Dashboard.Kelola Data.dataBuku')->name('kelola.buku');
Route::view('/dashboard/kelola-data/buku/create', 'Form.createBuku')->name('create.buku');
Route::view('/dashboard/kelola-data/buku/update', 'Form.updateBuku')->name('update.buku');

Route::view('/dashboard/kelola-data/anggota', 'Dashboard.Kelola Data.dataAnggota')->name('kelola.anggota');
Route::view('/dashboard/kelola-data/anggota/create', 'Form.createAnggota')->name('create.anggota');
Route::view('/dashboard/kelola-data/anggota/update', 'Form.updateAnggota')->name('update.anggota');

Route::view('/dashboard/sirkulasi', 'Dashboard.sirkulasi')->name('sirkulasi');
Route::view('/dashboard/sirkulasi/create', 'Form.createSirkulasi')->name('sirkulasi.create');

Route::view('/dashboard/log-data/peminjaman', 'Dashboard.Log Data.peminjaman')->name('log.peminjaman');
Route::view('/dashboard/log-data/pengembalian', 'Dashboard.Log Data.pengembalian')->name('log.pengembalian');

Route::view('/dashboard/laporan-sirkulasi', 'Dashboard.laporanSirkulasi')->name('laporan.sirkulasi');

Route::view('/dashboard/pengguna-sistem', 'Dashboard.penggunaSistem')->name('pengguna.sistem');
Route::view('/dashboard/pengguna-sistem/create', 'Form.createPengguna')->name('create.pengguna');
Route::view('/dashboard/pengguna-sistem/update', 'Form.updatePengguna')->name('update.pengguna');
