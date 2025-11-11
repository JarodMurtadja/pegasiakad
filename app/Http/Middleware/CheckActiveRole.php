<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login (sebagai keamanan tambahan)
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $activeRole = Session::get('active_role');
        $userRoles = Auth::user()->getRoleNames()->toArray();

        // Jika active_role belum diset, arahkan ke halaman pemilihan role
        if (is_null($activeRole) || $activeRole === '') {
            return redirect()->route('role');
        }

        // Jika active_role diset, pastikan nilainya ada di role user
        if (!in_array($activeRole, $userRoles)) {
            // Jika tidak valid, hapus session dan arahkan kembali ke pemilihan role
            Session::forget('active_role');
            return redirect()->route('role')->with('error', 'Role aktif tidak valid. Silakan pilih role kembali.');
        }

        return $next($request);
    }
}