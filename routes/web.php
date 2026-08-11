<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\AccueilController;
use App\Http\Controllers\Site\ProgrammeController as SiteProgrammeController;
use App\Http\Controllers\Site\ActualiteController as SiteActualiteController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\AProposController;
use App\Http\Controllers\Site\PartenaireController as SitePartenaireController;
use App\Http\Controllers\DemandePartenaireController;
use App\Http\Controllers\Site\DeposerProjetController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\Admin\CandidatureController;
use App\Http\Controllers\Admin\PartenaireController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\ProjetController as AdminProjetController;
use App\Http\Controllers\Admin\DemandePartenaireController as AdminDemandePartenaireController;
use App\Http\Controllers\Admin\MonitoringController;

use App\Http\Controllers\ProjetController;

// ============================================================
// ROUTES DU SITE PUBLIC
// ============================================================
Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('/programmes', [SiteProgrammeController::class, 'index'])->name('programmes.index');
Route::get('/programmes/{id}', [SiteProgrammeController::class, 'show'])->name('programmes.show');
Route::get('/programmes/{id}/candidature', [SiteProgrammeController::class, 'candidature'])->name('programmes.candidature');
Route::post('/programmes/{id}/postuler', [SiteProgrammeController::class, 'postuler'])->name('programmes.postuler');

Route::get('/actualites', [SiteActualiteController::class, 'index'])->name('actualites.index');
Route::get('/actualites/{id}', [SiteActualiteController::class, 'show'])->name('actualites.show');

Route::get('/partenaires', [SitePartenaireController::class, 'index'])->name('partenaires.index');
Route::post('/partenaires/devenir', [SitePartenaireController::class, 'devenir'])->name('partenaires.devenir');

Route::get('/a-propos', [AProposController::class, 'index'])->name('a-propos');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/envoyer', [ContactController::class, 'envoyer'])->name('contact.envoyer');

// Route pour soumettre un projet
Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');
Route::get('/partenaires/devenir', [DemandePartenaireController::class, 'create'])->name('partenaires.devenir');
Route::post('/partenaires/devenir', [DemandePartenaireController::class, 'store'])->name('partenaires.devenir.store');
Route::get('/deposer-projet', [DeposerProjetController::class, 'index'])->name('deposer-projet');

// ============================================================
// ROUTES ADMIN (Dashboard)
// ============================================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Routes d'authentification (publiques)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Routes protégées (nécessitent une connexion)
    Route::middleware(['admin.auth'])->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Programmes (CRUD complet)
        Route::resource('programmes', ProgrammeController::class);

        // Actualités (CRUD complet)
        Route::resource('actualites', ActualiteController::class);

        // Partenaires (CRUD complet)
        Route::resource('partenaires', PartenaireController::class);

        // Candidatures
        Route::get('/candidatures', [CandidatureController::class, 'index'])->name('candidatures.index');
        Route::get('/candidatures/{id}', [CandidatureController::class, 'show'])->name('candidatures.show');
        Route::put('/candidatures/{id}/statut', [CandidatureController::class, 'updateStatut'])->name('candidatures.statut');
        Route::delete('/candidatures/{id}', [CandidatureController::class, 'destroy'])->name('candidatures.destroy');

        // Demandes (contact)
        Route::get('/demandes', [DemandeController::class, 'index'])->name('demandes.index');
        Route::get('/demandes/{id}', [DemandeController::class, 'show'])->name('demandes.show');
        Route::put('/demandes/{id}/traite', [DemandeController::class, 'marquerTraite'])->name('demandes.traite');
        Route::delete('/demandes/{id}', [DemandeController::class, 'destroy'])->name('demandes.destroy');

        // ===== DEMANDES PARTENAIRES =====
        Route::get('/demandes-partenaires', [AdminDemandePartenaireController::class, 'index'])->name('demandes-partenaires.index');
        Route::get('/demandes-partenaires/{id}', [AdminDemandePartenaireController::class, 'show'])->name('demandes-partenaires.show');
        Route::put('/demandes-partenaires/{id}/traite', [AdminDemandePartenaireController::class, 'marquerTraite'])->name('demandes-partenaires.traite');
        Route::delete('/demandes-partenaires/{id}', [AdminDemandePartenaireController::class, 'destroy'])->name('demandes-partenaires.destroy');

        // ===== PROJETS =====
        Route::prefix('projets')->name('projets.')->group(function () {
            Route::get('/', [AdminProjetController::class, 'index'])->name('index');
            Route::get('/{id}', [AdminProjetController::class, 'show'])->name('show');
            Route::put('/{id}/statut', [AdminProjetController::class, 'updateStatut'])->name('statut');
            Route::delete('/{id}', [AdminProjetController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/notifier', [AdminProjetController::class, 'notifier'])->name('notifier');
        });

        // ===== MONITORING =====
        Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');
    });
});
