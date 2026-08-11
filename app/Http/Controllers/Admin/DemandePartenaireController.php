<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandePartenaire;
use Illuminate\Http\Request;

class DemandePartenaireController extends Controller
{
    public function index()
    {
        $demandes = DemandePartenaire::orderBy('created_at', 'desc')->get();
        return view('admin.demandes-partenaires.index', compact('demandes'));
    }

    public function show($id)
    {
        $demande = DemandePartenaire::findOrFail($id);
        return view('admin.demandes-partenaires.show', compact('demande'));
    }

    public function marquerTraite($id)
    {
        $demande = DemandePartenaire::findOrFail($id);
        $demande->update(['traite' => true]);
        return redirect()->back()->with('success', 'Demande marquée comme traitée !');
    }

    public function destroy($id)
    {
        DemandePartenaire::destroy($id);
        return redirect()->route('admin.demandes-partenaires.index')->with('success', 'Demande supprimée !');
    }
}
