<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    const TIMEOUT = 180;
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');
            if ($lastActivity && (time() - $lastActivity > self::TIMEOUT)) {
                Auth::logout();
                session()->flush(); // Hapus semua sesi
                return redirect()->route('beranda')->with('message', 'Sesi Anda telah berakhir karena tidak ada aktivitas.');
            }
            session(['lastActivityTime' => time()]);
        }

        return $next($request);
    }
}
