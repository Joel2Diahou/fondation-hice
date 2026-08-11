<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\Candidature;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::all();
        return view('site.programmes.index', compact('programmes'));
    }

    public function show($id)
    {
        $programme = Programme::findOrFail($id);
        return view('site.programmes.show', compact('programme'));
    }

    public function candidature($id)
    {
        $programme = Programme::findOrFail($id);
        return view('site.programmes.candidature', compact('programme'));
    }

    public function postuler(Request $request, $id)
    {
        $request->validate([
            'nom_complet' => 'required',
            'email' => 'required|email',
            'motivation_fr' => 'required',
        ]);

        Candidature::create([
            'programme_id' => $id,
            'nom_complet' => $request->nom_complet,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'age' => $request->age,
            'ville' => $request->ville,
            'motivation_fr' => $request->motivation_fr,
            'motivation_en' => $request->motivation_en,
            'statut' => 'en_attente',
            'date_candidature' => now(),
        ]);

        return redirect()->back()->with('success', 'Candidature envoyée avec succès !');
    }
}
