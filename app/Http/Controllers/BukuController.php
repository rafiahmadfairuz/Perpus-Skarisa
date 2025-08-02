<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('Dashboard.Kelola Data.dataBuku', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastBuku = Buku::orderBy('id_buku', 'desc')->first();

        $lastNumber = 0;
        if ($lastBuku && preg_match('/^B(\d{3})$/', $lastBuku->id_buku, $matches)) {
            $lastNumber = (int) $matches[1];
        }

        $newId = 'B' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return view('Form.createBuku', ['newId' => $newId]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku' => 'nullable|string|unique:bukus,id_buku',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'th_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
        ]);

        $newId = $validated['id_buku'] ?? null;
        if (!$newId || Buku::where('id_buku', $newId)->exists()) {
            $lastBuku = Buku::orderBy('id_buku', 'desc')->first();

            $lastNumber = 0;
            if ($lastBuku && preg_match('/^B(\d{3})$/', $lastBuku->id_buku, $matches)) {
                $lastNumber = (int) $matches[1];
            }

            $newId = 'B' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        Buku::create(array_merge($validated, ['id_buku' => $newId]));

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        return view("Form.updateBuku", compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();

        $validated = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'th_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus!');
    }
}
