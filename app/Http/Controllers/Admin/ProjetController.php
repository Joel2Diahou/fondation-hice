<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::orderBy('created_at', 'desc')->get();
        return view('admin.projets.index', compact('projets'));
    }

    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        $notifications = Notification::where('projet_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.projets.show', compact('projet', 'notifications'));
    }

    public function updateStatut(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);
        $projet->update(['statut' => $request->statut]);
        return redirect()->back()->with('success', 'Statut du projet mis à jour !');
    }

    public function destroy($id)
    {
        Projet::destroy($id);
        return redirect()->route('admin.projets.index')->with('success', 'Projet supprimé !');
    }

    /**
     * Envoyer une notification au candidat
     */
    public function notifier(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);
        $notificationService = new NotificationService();

        $request->validate([
            'message' => 'required|string',
            'sujet' => 'nullable|string',
        ]);

        $sujet = $request->sujet ?? 'Mise à jour de votre projet';
        $message = $request->message;

        // Envoyer l'email
        $resultat = $notificationService->sendEmail($projet, $sujet, $message);

        if ($resultat['success']) {
            return redirect()->back()->with('success', '✅ Notification envoyée avec succès !');
        } else {
            return redirect()->back()->with('error', '❌ Erreur : ' . $resultat['message']);
        }
    }
}
