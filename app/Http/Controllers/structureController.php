<?php
namespace App\Http\Controllers;

public function store(Request $request)
{
    // validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'id_responsable' => 'required|integer|exists:users,id',
    ]);

    $user = User::find($request->id_responsable);
    if ($user && $user->poste === 'cadre sup') {
        // Créer la structure
        Structure::create([
            'nom' => $request->nom,
            'id_responsable' => $request->id_responsable,
        ]);

        return redirect()->route('structures.index')->with('success', 'Structure créée avec succès.');
    } else {
        // Si l'utilisateur n'est pas "cadre sup"
        return redirect()->back()->withErrors('Le responsable doit être un cadre sup.');
    }
}
public function update(Request $request, Structure $structure)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'id_responsable' => 'required|integer|exists:users,id',
    ]);

    $user = User::find($request->id_responsable);
    if ($user && $user->poste === 'cadre sup') {
        $structure->update([
            'nom' => $request->nom,
            'id_responsable' => $request->id_responsable,
        ]);

        return redirect()->route('structures.index')->with('success', 'Structure mise à jour avec succès.');
    } else {
        return redirect()->back()->withErrors('Le responsable doit être un cadre sup.');
    }
}
