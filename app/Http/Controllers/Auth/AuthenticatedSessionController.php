<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Afficher la vue de connexion.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->email === 'president@exemple.com') {
        return redirect()->route('president.dashboard'); // redirection pour le président
       
        
    }

    return redirect()->route('employe.dashboard'); // redirection pour l’employé
}

    /**
     * Gérer la requête d'authentification entrante.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Vérifie le rôle de l'utilisateur
        if (auth()->user()->role === 'president') {
            // Redirige vers le tableau de bord du président
            return redirect()->route('president.dashboard');
        } else {
            // Redirige vers le tableau de bord de l'employé
            return redirect()->route('employee.dashboard');
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login'); // Redirection vers la page login après déconnexion
    }
    
}
