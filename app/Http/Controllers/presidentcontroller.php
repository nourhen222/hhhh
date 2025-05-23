<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doleance;
use App\Models\Reunion;  // <-- ajoute cet import

class PresidentController extends Controller
{
   public function dashboard() {
    $doleances = Doleance::all();
    $reunions = Reunion::all();

    // Compter les doléances par mois
    $countsByMonth = [];
    for ($m = 1; $m <= 12; $m++) {
        $countsByMonth[$m] = Doleance::whereMonth('created_at', $m)->count();
    }

    // Préparer le tableau pour Chart.js
    $labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    $data = [];
    foreach ($countsByMonth as $month => $count) {
        $data[] = $count;
    }

    $statsMensuelles = [
        'labels' => $labels,
        'data' => $data,
    ];

    return view('president.dashboard', compact('doleances', 'reunions', 'statsMensuelles'));
}public function index()
{
    // Exemple : récupérer toutes les doléances depuis la base
    $doleances = Doleance::all();

    // Puis transmettre la variable à la vue
    return view('president.dashboard', compact('doleances'));
}

}
