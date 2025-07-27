<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Surat;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $jmlhuser = User::count();
        $jmlpengguna = User::where('role', 'user')->count();

        $jmlpengajuan = Surat::count();

        $iuranpengguna = Iuran::count();

        $pengajuan = Surat::orderBy('created_at', 'desc')->take(3)->get();

        $usernew = User::orderBy('created_at', 'desc')->take(3)->get();



        return view('admindash',[
            'jmlhhuser' => $jmlhuser,
            'jmlpengguna' => $jmlpengguna,
            'pengajuancount' => $jmlpengajuan,
            'iuranpengguna' => $iuranpengguna,
            'pengajuan' => $pengajuan,
            'usernew' => $usernew
        ]);
    }
}
