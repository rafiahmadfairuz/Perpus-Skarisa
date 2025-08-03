<?php

namespace App\Http\Controllers;

use App\Models\LogPinjam;
use Illuminate\Http\Request;

class LogDataController extends Controller
{
    public function dataPeminjaman()
    {
        $dataPeminjam = LogPinjam::all();
        return view('Dashboard.Log Data.peminjaman', compact('dataPeminjam'));
    }

    public function dataPengembalian()
    {
        $dataPengembalian = \App\Models\Sirkulasi::with(['buku', 'anggota'])
            ->where('status', 'KEM')
            ->whereNotNull('tgl_dikembalikan')
            ->select('id_buku', 'id_anggota', 'tgl_dikembalikan')
            ->get();

        return view('Dashboard.Log Data.pengembalian', compact('dataPengembalian'));
    }
}
