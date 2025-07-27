<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function TampilForm()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();  // Membersihkan semua sesi
        return redirect()->route('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        Auth::logout();

        // Menghapus sesi lama
        session()->flush();

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            session()->regenerate();

            // Redirect berdasarkan role
            $user = Auth::user();
            return $user->role === 'admin' ? redirect()->route('admindash') : redirect()->route('beranda');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
