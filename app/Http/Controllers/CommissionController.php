<?php

// app/Http/Controllers/CommissionController.php

namespace App\Http\Controllers;
use App\Models\Commission;  // Assure-toi d'importer la classe Commission
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Membre; // Assure-toi que la classe Membre est bien importée

class CommissionController extends Controller
{
    // Afficher la liste des membres et des commissions
    public function index()
    {
            // Récupérer une commission spécifique, par exemple la commission avec l'id 1
            $commission = Commission::with('membres.user.structure')->find(1);
        
            // Vérifier si la commission existe
            if (!$commission) {
                return redirect()->back()->with('error', 'Commission non trouvée.');
            }
        
            // Les membres sont déjà chargés via with()
            $membres = $commission->membres;
        
            // Retourner la vue avec les données nécessaires
            return view('president.commission.index', compact('commission', 'membres'));

            
    }
        
}

