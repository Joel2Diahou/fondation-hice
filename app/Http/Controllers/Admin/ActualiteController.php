<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::orderBy('created_at', 'desc')->get();
        return view('admin.actualites.index', compact('actualites'));
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'categorie' => 'nullable|string',
            'auteur' => 'nullable|string',
            'date_publication' => 'nullable|date',
            'est_publie' => 'nullable|boolean',
        ]);

        Actualite::create($request->all());
        return redirect()->route('admin.actualites.index')->with('success', 'Actualité créée avec succès !');
    }

    public function edit($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(Request $request, $id)
    {
        $actualite = Actualite::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'categorie' => 'nullable|string',
            'auteur' => 'nullable|string',
            'date_publication' => 'nullable|date',
            'est_publie' => 'nullable|boolean',
        ]);

        $actualite->update($request->all());
        return redirect()->route('admin.actualites.index')->with('success', 'Actualité mise à jour !');
    }

    public function destroy($id)
    {
        Actualite::destroy($id);
        return redirect()->route('admin.actualites.index')->with('success', 'Actualité supprimée !');
    }
}
