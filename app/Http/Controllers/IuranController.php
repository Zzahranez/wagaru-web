<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $userId = Auth::id();
       
        $iurans = Iuran::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->get();

        return view('iuran', ['iurans' => $iurans]);
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
        $iuran = Iuran::findOrFail($id);
        return response()->json($iuran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama_iuran' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'status' => 'required|in:belum dibayar,selesai', // Status harus salah satu dari nilai ini
        ]);

        // Mengambil data iuran berdasarkan ID
        $iuran = Iuran::findOrFail($id);

        // Memperbarui data iuran
        $iuran->update([
            'nama_iuran' => $request->input('nama_iuran'),
            'jumlah' => $request->input('jumlah'),
            'tanggal' => $request->input('tanggal'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('adminkelolaiuran.index')->with('success', 'Iuran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
