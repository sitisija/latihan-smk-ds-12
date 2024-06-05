<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginPengguna
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //fungsi untuk mengecek user sudah login atau belum
        if(Auth::check()){
            //dilanjutkan ke halaman login
            return $next($request);
        }
        return redirect()->route('login');
    }
}
