<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(){

        $surat = Surat::where('status', 'Dalam proses')->count();
        $user = User::where('role', 'user')->count();
        $nama_iuran = Iuran::distinct()->pluck('nama_iuran');

        return view('beranda',[
            'surat' => $surat,
            'user' => $user,
            'namaiuran' => $nama_iuran
        ]);
    }
}
