<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    // Middleware qui permet de vérifier si l'utilisateur est connecté et est un admin
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect()->route('films.index')->with('error', 'Accès interdit.');
    }
}
