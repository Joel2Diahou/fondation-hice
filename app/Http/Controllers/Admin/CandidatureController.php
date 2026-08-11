<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    public function index()
    {
        $candidatures = Candidature::with('programme')->get();
        return view('admin.candidatures.index', compact('candidatures'));
    }

    public function show($id)
    {
        $candidature = Candidature::with('programme')->findOrFail($id);
        return view('admin.candidatures.show', compact('candidature'));
    }

    public function updateStatut(Request $request, $id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->update(['statut' => $request->statut]);
        return redirect()->back()->with('success', 'Statut mis à jour !');
    }

    public function destroy($id)
    {
        Candidature::destroy($id);
        return redirect()->route('admin.candidatures.index')->with('success', 'Candidature supprimée !');
    }
}
