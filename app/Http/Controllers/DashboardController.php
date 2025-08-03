<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Sirkulasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalAnggota = Anggota::count();
        $totalSirkulasi = Sirkulasi::where('status', 'PIN')->count();
        $totalLaporan = Sirkulasi::where('status', 'KEM')->count();

        return view('Dashboard.index', compact('totalBuku', 'totalAnggota', 'totalSirkulasi', 'totalLaporan'));
    }
}
