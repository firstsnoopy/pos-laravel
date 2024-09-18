<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;


class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $id_level): Response
    {
        $user = Auth::user();
        if(!$user) {
            return redirect()->to('/login');
        }
        if(!$user -> id_level != $id_level) {
            Alert::warning('Menu tidak dapat dilihat', 'Hanya kasir yang memiliki akses');
            return redirect()->to('dashboard');
        }
        return $next($request);
    }
}
