<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\LogPinjam;
use App\Models\Sirkulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SirkulasiController extends Controller
{
    public function index()
    {
        $sirkulasis = Sirkulasi::where('status', 'PIN')->get();
        return view('Dashboard.sirkulasi', compact('sirkulasis'));
    }

    public function logSirkulasi()
    {
        $sirkulasis = Sirkulasi::where('status', 'KEM')->get();
        return view('Dashboard.laporanSirkulasi', compact('sirkulasis'));
    }

    public function formUpdateSirkulasi()
    {
        $idSirkulasi = Sirkulasi::orderBy('id_sirkulasi', 'desc')->first();

        $lastNumber = 0;
        if ($idSirkulasi && preg_match('/^SIR(\d{3})$/', $idSirkulasi->id_sirkulasi, $matches)) {
            $lastNumber = (int) $matches[1];
        }

        $newId = 'SIR' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('Form.createSirkulasi', compact('anggotas', 'bukus',  'newId'));
    }


    public function storeSirkulasi(Request $request)
    {
        $request->validate([
            'id_sirkulasi' => 'required|string|unique:sirkulasis,id_sirkulasi',
            'id_anggota'   => 'required|exists:anggotas,id_anggota',
            'id_buku'      => 'required|exists:bukus,id_buku',
            'tgl_pinjam'   => 'required|date',
        ]);

        $tgl_dikembalikan = \Carbon\Carbon::parse($request->tgl_pinjam)->addDays(7);
        Sirkulasi::create([
            'id_sirkulasi'     => $request->id_sirkulasi,
            'id_anggota'       => $request->id_anggota,
            'id_buku'          => $request->id_buku,
            'tgl_pinjam'       => $request->tgl_pinjam,
            'tgl_kembali'      => $tgl_dikembalikan->format('Y-m-d'),
            'tgl_dikembalikan' => null,
            'status'           => 'PIN',
        ]);

        LogPinjam::create([
            'id_anggota' => $request->id_anggota,
            'id_buku'    => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
        ]);



        return redirect()->route('sirkulasi')->with('success', 'Data sirkulasi berhasil ditambahkan.');
    }

    public function up($id)
    {
        $sirkulasi = Sirkulasi::findOrFail($id);
        $sirkulasi->tgl_kembali = Carbon::parse($sirkulasi->tgl_kembali)->addDays(7);
        $sirkulasi->save();

        return back()->with('success', 'Jatuh tempo diperpanjang 7 hari.');
    }

    public function kembalikan($id)
    {
        $sirkulasi = Sirkulasi::findOrFail($id);
        $sirkulasi->tgl_dikembalikan = Carbon::now();
        $sirkulasi->status = 'KEM';
        $sirkulasi->save();

        return back()->with('success', 'Buku berhasil dikembalikan.');
    }

    public function printLaporan()
    {
        $sirkulasis = Sirkulasi::where('status', 'KEM')->get();
        return view('Print.laporanSirkulasi', compact('sirkulasis'));
    }
}
