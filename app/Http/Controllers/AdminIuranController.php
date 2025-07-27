<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class AdminIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dataiurans = Iuran::all();
        $users = User::all(); // Ambil semua data dari tabel users
        return view('adminkelolaiuran', [
            'dataiurans' => $dataiurans,
            'users' => $users
        ]);
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

        // Validasi input
        $request->validate([
            'nama_iuran' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        // Iterasi ke semua pengguna dan buat iuran untuk masing-masing
        $users = User::all();
        foreach ($users as $user) {
            $iuran = new Iuran();
            $iuran->user_id = $user->id;
            $iuran->nama_iuran = $request->nama_iuran;
            $iuran->jumlah = $request->jumlah;
            $iuran->tanggal = $request->tanggal;
            $iuran->save();
        }

        return redirect()->route('adminkelolaiuran.index')->with('success', 'Iuran berhasil ditambahkan untuk semua pengguna.');
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
        $iuran = Iuran::findOrFail($id); // Ambil data iuran berdasarkan ID
        return view('adminkelolaiuran', compact('iuran'));
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
        $iurans = Iuran::find($id);
        if (!$iurans) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }
        $iurans->delete();

        return redirect()->route('adminkelolaiuran.index')->with('success', 'Data berhasil dihapus!');
    }
}
