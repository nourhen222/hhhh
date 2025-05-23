<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\DoleanceController;
use App\Http\Middleware\CheckIfPresident;

// Page d'accueil
Route::get('/', function () {
    return view('home');
})->name('home');

// Formulaire de login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Routes sécurisées
Route::middleware(['auth'])->group(function () {

    // ➤ Pour tous les utilisateurs connectés
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/employee', function () {
        return view('employee.dashboard');
    })->name('employee.dashboard');

    // ➤ Pour le président uniquement
    Route::middleware([CheckIfPresident::class])->group(function () {

        // Tableau de bord du président
Route::get('/dashboard/president', [PresidentController::class, 'index'])->name('dashboard.president');
Route::get('/president/dashboard', [PresidentController::class, 'dashboard'])->name('president.dashboard');

        // Réunions
        Route::get('/president/reunion/create', [ReunionController::class, 'create'])->name('reunion.create');
        Route::post('/president/reunion/store', [ReunionController::class, 'store'])->name('reunion.store');

        // Commissions
        Route::get('/president/commission', [CommissionController::class, 'index'])->name('commission.index');

        // Doléances
        Route::get('/pv-decision/{id}', [DoleanceController::class, 'pvDecision'])->name('doleance.pvDecision');
Route::put('/doleance/{id}/etat', [DoleanceController::class, 'updateEtat'])->name('doleance.updateEtat');
Route::post('/doleances/{id}/pv-decision', [DoleanceController::class, 'enregistrerPvDecision'])->name('doleance.pvDecision');
Route::get('/pv/{id}', [DoleanceController::class, 'downloadPv'])->name('doleance.downloadPv');

    });

    // Déconnexion
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Auth routes (Breeze/Fortify)
require __DIR__.'/auth.php';
