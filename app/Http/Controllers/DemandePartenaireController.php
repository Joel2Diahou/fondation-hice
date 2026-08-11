<?php

namespace App\Http\Controllers;

use App\Models\DemandePartenaire;
use Illuminate\Http\Request;

class DemandePartenaireController extends Controller
{
    public function create()
    {
        return view('site.partenaires.devenir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'entreprise' => 'required|string|max:255',
            'nom_contact' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'type_partenariat' => 'required|in:sponsor,mecene,partenaire,autre',
            'message' => 'required|string',
        ]);

        DemandePartenaire::create($request->all());

        return redirect()->route('partenaires.devenir')
            ->with('success', 'Votre demande de partenariat a été envoyée avec succès ! Nous vous contacterons rapidement.');
    }
}
