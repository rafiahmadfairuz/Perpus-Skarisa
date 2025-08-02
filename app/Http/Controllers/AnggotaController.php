<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('Dashboard.Kelola Data.dataAnggota', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastAnggota = Anggota::orderBy('id_anggota', 'desc')->first();

        $lastNumber = 0;
        if ($lastAnggota && preg_match('/^A(\d{3})$/', $lastAnggota->id_anggota, $matches)) {
            $lastNumber = (int) $matches[1];
        }

        $newId = 'A' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return view('Form.createAnggota', ['newId' => $newId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_anggota' => 'required|string|unique:anggotas,id_anggota',
            'nama' => 'required|string|max:255',
            'jekel' => 'required|in:Laki-Laki,Perempuan',
            'kelas' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
        ]);

        if (Anggota::where('id_anggota', $validated['id_anggota'])->exists()) {
            $lastAnggota = Anggota::orderBy('id_anggota', 'desc')->first();

            $lastNumber = 0;
            if ($lastAnggota && preg_match('/^A(\d{3})$/', $lastAnggota->id_anggota, $matches)) {
                $lastNumber = (int) $matches[1];
            }

            $validated['id_anggota'] = 'A' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        Anggota::create($validated);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = Anggota::where('id_anggota', $id)->firstOrFail();
        return view('', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::where('id_anggota', $id)->firstOrFail();
        return view('Form.updateAnggota', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anggota = Anggota::where('id_anggota', $id)->firstOrFail();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jekel' => 'required|in:Laki-Laki,Perempuan',
            'kelas' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
        ]);

        $anggota->update($validated);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::where('id_anggota', $id)->firstOrFail();
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}
