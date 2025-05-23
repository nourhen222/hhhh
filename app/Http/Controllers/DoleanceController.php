<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doleance;
use App\Models\Reunion;
use Illuminate\Support\Facades\Storage;

class DoleanceController extends Controller
{
    // Mise à jour de l'état d'une doléance
    public function updateEtat(Request $request, $id)
    {
        $doleance = Doleance::findOrFail($id);
        $doleance->etat = $request->input('etat');
        $doleance->save();

        return redirect()->back()->with('success', 'État de la doléance mis à jour.');
    }

    public function index()
    {
        $doleances = Doleance::with('user')->orderBy('created_at', 'asc')->get();
        $reunions = Reunion::all();

        return view('president.dashboard', compact('doleances', 'reunions'));
    }

    public function pvDecision(Request $request, $id)
    {
        $doleance = Doleance::findOrFail($id);

        if ($request->input('action') === 'save_pv') {
            // Validation et enregistrement du PV seul
            if ($request->hasFile('pv_file')) {
                $request->validate([
                    'pv_file' => 'file|mimes:pdf,doc,docx|max:2048',
                ]);
                $file = $request->file('pv_file');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/pv', $filename);

                $doleance->pv = $filename;
                $doleance->save();

                return back()->with('success', 'PV enregistré avec succès.');
            }
            return back()->withErrors(['pv_file' => 'Veuillez sélectionner un fichier valide.']);
        }

        if ($request->input('action') === 'save_decision') {
            // Validation et enregistrement de la décision seule
            $request->validate([
                'decision' => 'nullable|string|max:1000',
            ]);

            $doleance->decision = $request->input('decision');
            $doleance->save();

            return back()->with('success', 'Décision enregistrée avec succès.');
        }

        return back()->withErrors(['action' => 'Action non reconnue.']);
    }

    // Nouvelle méthode pour afficher / télécharger le PV
    public function downloadPv($id)
    {
        $doleance = Doleance::findOrFail($id);

        if (!$doleance->pv || !Storage::disk('public')->exists('pv/'.$doleance->pv)) {
            abort(404, "PV non trouvé.");
        }

        return Storage::disk('public')->download('pv/'.$doleance->pv);
    }
}
