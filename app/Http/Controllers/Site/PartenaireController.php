<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use App\Models\Demande;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('site.partenaires.index', compact('partenaires'));
    }

    public function devenir(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'entreprise' => 'required',
            'message' => 'required',
        ]);

        Demande::create([
            'type' => 'partenariat',
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'entreprise' => $request->entreprise,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Demande de partenariat envoyée !');
    }
}
