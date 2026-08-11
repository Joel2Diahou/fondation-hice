<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = Demande::all();
        return view('admin.demandes.index', compact('demandes'));
    }

    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        return view('admin.demandes.show', compact('demande'));
    }

    public function marquerTraite($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->update(['traite' => true]);
        return redirect()->back()->with('success', 'Demande marquée comme traitée !');
    }

    public function destroy($id)
    {
        Demande::destroy($id);
        return redirect()->route('admin.demandes.index')->with('success', 'Demande supprimée !');
    }
}
