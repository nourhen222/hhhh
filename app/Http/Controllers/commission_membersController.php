<?php
namespace App\Http\Controllers;

// Dans ton contrôleur
use App\Models\Commission;

public function show($id)
{
    // Trouver la commission par son ID avec ses membres et les utilisateurs liés
    $commission = Commission::with(['membres.user'])->findOrFail($id);

    // Les membres sont déjà chargés avec leurs utilisateurs
    $membres = $commission->membres;

    return view('commission.show', compact('commission', 'membres'));
}

