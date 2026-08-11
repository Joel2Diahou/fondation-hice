<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'categorie' => 'required|in:college,lycee,universite',
            'classe_niveau' => 'required|string|max:255',
            'nom_projet' => 'required|string|max:255',
            'description_projet' => 'required|string',
            'objectifs' => 'required|string',
            'besoins' => 'nullable|string',
        ]);

        Projet::create($request->all());

        return redirect()->route('accueil')->with('success_projet', 'Votre projet a été soumis avec succès ! Notre équipe vous contactera bientôt.');
    }
}
