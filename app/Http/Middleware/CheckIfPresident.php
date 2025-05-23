<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfPresident
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie d'abord que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Vérifie si l'utilisateur est un président
        if (Auth::user()->role !== 'president') {
            return redirect()->route('employee.dashboard');
        }

        return $next($request);
    }
}
