<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->id_rol === 0) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Acceso denegado');
    }
}
