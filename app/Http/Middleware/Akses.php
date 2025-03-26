<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Akses
{
    /**
     * Handle an incoming request.
     * @param \Closure(\illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah pengguna sudah login dan memiliki role yang sesuai
        if (auth()->user()->role == $role) {
            return $next($request); // Akses diterima
        }

        // Jika role tidak sesuai, redirect ke halaman home atau halaman lain
        return redirect('/');
    }
}