<?php
namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Doleance;
use App\Models\User;
use App\Models\Reunion;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    /**
     * Affiche le formulaire de création d'une réunion
     */
    public function create()
    {
        $doleances = Doleance::where('etat', 'soumise')->get();

        // Récupérer la commission active (ex. : la plus récente)
        $commission = Commission::latest()->first();

        // Vérifier si la commission existe et récupérer les membres avec statut 'travail'
        $membres = $commission
            ? $commission->membres()->where('statut', 'travail')->with('user')->get() // Filtrage sur le statut 'travail'
            : collect(); // Vide si aucune commission

        return view('president.reunion.create', [
            'doleances' => $doleances,
            'membres' => $membres
        ]);
    }
public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string',
        'date' => 'required|date',
        'heure' => 'required',
        'lieu' => 'required|string',
        'doleances' => 'nullable|array',
        'membres' => 'nullable|array',
    ]);

    // 1. Créer la réunion
    $reunion = Reunion::create([
        'titre' => $request->titre,
        'date' => $request->date,
        'heure' => $request->heure,
        'lieu' => $request->lieu,
        'user_id' => 11,
    ]);

    // 2. Attacher les doléances sélectionnées
    if ($request->has('doleances')) {
        $reunion->doleances()->attach($request->doleances);

        // 3. Mettre à jour l'état des doléances en "en cours"
        Doleance::whereIn('id', $request->doleances)->update(['etat' => 'en cours']);
    }

    // 4. Attacher les membres de la commission si sélectionnés
    if ($request->has('membres')) {
        $reunion->membres()->attach($request->membres);
    }

    return redirect()->route('reunion.index')->with('success', 'Réunion créée avec succès !');
}
}