<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('admin.partenaires.index', compact('partenaires'));
    }

    public function create()
    {
        return view('admin.partenaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
        ]);

        Partenaire::create($request->all());
        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire ajouté avec succès !');
    }

    public function edit($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        return view('admin.partenaires.edit', compact('partenaire'));
    }

    public function update(Request $request, $id)
    {
        $partenaire = Partenaire::findOrFail($id);
        $partenaire->update($request->all());
        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire mis à jour !');
    }

    public function destroy($id)
    {
        Partenaire::destroy($id);
        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire supprimé !');
    }
}
