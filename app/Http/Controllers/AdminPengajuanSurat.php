<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPengajuanSurat extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surats = Surat::all();  // Mengambil semua data surat
        return view('adminpengajuansurat', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $surat = Surat::findOrFail($id);
        return view('adminpengajuansurat.index', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $surat = Surat::findOrFail($id);

        // Validasi input data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenis_surat' => 'required|string|max:255',
            'status' => 'required|string|in:Dalam proses,Selesai',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // Pastikan validasi cocok
           
        ]);

        // Memperbarui data surat
        $surat->update($validatedData);

        // Redirect setelah berhasil update
        return redirect()->route('adminpengajuansurat.index')->with('success', 'Surat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();  // Menghapus data surat
        return redirect()->route('adminpengajuansurat.index')->with('success', 'Surat berhasil dihapus!');
    }
}
