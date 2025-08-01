<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Route utama ke dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// Kelola Data
Route::view('/dashboard/kelola-data/buku', 'Dashboard.Kelola Data.dataBuku')->name('kelola.buku');
Route::view('/dashboard/kelola-data/anggota', 'Dashboard.Kelola Data.dataAnggota')->name('kelola.anggota');

// Sirkulasi
Route::view('/dashboard/sirkulasi', 'Dashboard.sirkulasi')->name('sirkulasi');

// Log Data
Route::view('/dashboard/log-data/peminjaman', 'Dashboard.Log Data.peminjaman')->name('log.peminjaman');
Route::view('/dashboard/log-data/pengembalian', 'Dashboard.Log Data.pengembalian')->name('log.pengembalian');

// Laporan Sirkulasi
Route::view('/dashboard/laporan-sirkulasi', 'Dashboard.laporanSirkulasi')->name('laporan.sirkulasi');

// Setting > Pengguna Sistem
Route::view('/dashboard/pengguna-sistem', 'Dashboard.penggunaSistem')->name('pengguna.sistem');
