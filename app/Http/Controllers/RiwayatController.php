<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
class RiwayatController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Mendapatkan user yang sedang login

            // Mengambil data surat berdasarkan email user
            $permohonans = Surat::where('email', $user->email)->get();

            // Kirim data ke view
            return view('riwayat', compact('permohonans'));
        } else {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }
    private function getSuratViewByJenis($jenis_surat)
    {
        switch ($jenis_surat) {
            case 'Surat Keterangan Tidak Mampu':
                return 'surat.sktm'; 
            case 'Surat Pengantar Pembuatan KK':
                return 'surat.sppk'; 
            case 'Surat Keterangan Berkelakuan Baik':
                return 'surat.skkb'; 
            default:
                return 'surat.default'; // Jika jenis surat tidak dikenali
        }
    }
    public function download($id)
    {
        // Cari data permohonan surat berdasarkan ID
        $permohonan = Surat::findOrFail($id);

        if ($permohonan->status !== 'Selesai') {
            return redirect()->back()->with('error', 'Surat belum selesai diproses');
        }
        $view = $this->getSuratViewByJenis($permohonan->jenis_surat);

        // Buat file PDF dari view surat
        $pdf = PDF::loadView($view, ['permohonan' => $permohonan]);
        $pdf->setOption('title', 'Surat ' . $permohonan->jenis_surat);
        $fileName = 'surat_' . $permohonan->jenis_surat . '.pdf';

        //Download PDF dengan nama file dinamis
        return $pdf->download($fileName);
    }

}
