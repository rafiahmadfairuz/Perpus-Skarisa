<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::all();
        return view('Dashboard.penggunaSistem', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Form.createPengguna');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "username" => 'required|unique:users,username',
            "password" => "required"
        ]);

        User::create([
            'username' => $request->username,
            'password' => $request->password
        ]);

        return redirect()->route('dashboard.index');
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
        $pengguna = User::where('id', $id);
        return view('Form.updatePengguna', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengguna = User::findOrfail($id);
        $request->validate([
            'username' => "required|unique:users,username," . $pengguna->id,
            "password" => "required"
        ]);

        $pengguna->update([
            "username" => $request->username,
            'password' => $request->password
        ]);

        return redirect()->route('pengguna.index')->with('sukses', "Sukses Mengupdate Pengguna");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
