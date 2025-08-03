<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogDataController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SirkulasiController;
use App\Models\Sirkulasi;

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login.index')->middleware('guest');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('login');

Route::middleware("auth")->group(function () {
    Route::post('/logout', [AuthController::class, "logout"])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/buku', BukuController::class);
    Route::resource('/anggota', AnggotaController::class);

    Route::get("/sirkulasi", [SirkulasiController::class, 'index'])->name('sirkulasi');
    Route::get('/sirkulasi/create', [SirkulasiController::class, 'formUpdateSirkulasi'])->name('sirkulasi.create');
    Route::post('/sirkulasi/create', [SirkulasiController::class, 'storeSirkulasi'])->name('sirkulasi.store');


    Route::get('/data/peminjaman', [LogDataController::class, "dataPeminjaman"])->name('log.peminjaman');
    Route::get('/data/pengembalian', [LogDataController::class, "dataPengembalian"])->name('log.pengembalian');

    Route::patch('/sirkulasi/up/{id}', [SirkulasiController::class, 'up'])->name('sirkulasi.up');
    Route::patch('/sirkulasi/kembalikan/{id}', [SirkulasiController::class, 'kembalikan'])->name('sirkulasi.kembalikan');


    Route::get('/laporan/sirkulasi', [SirkulasiController::class, 'logSirkulasi'])->name('laporan.sirkulasi');

    Route::resource('/pengguna', PenggunaController::class);

    Route::get('/print', [AnggotaController::class, 'print'])->name('anggota.cetak');
    Route::get('/anggota/print/{id}', [AnggotaController::class, 'printKartu'])->name('anggota.print.kartu');
    Route::get('/laporan/print', [SirkulasiController::class, 'printLaporan'])->name('print.laporan');

});
