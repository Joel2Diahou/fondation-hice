<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::all();
        return view('admin.programmes.index', compact('programmes'));
    }

    public function create()
    {
        return view('admin.programmes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'required|in:ouvert,ferme,a_venir',
        ]);

        Programme::create($request->all());
        return redirect()->route('admin.programmes.index')->with('success', 'Programme créé avec succès !');
    }

    public function edit($id)
    {
        $programme = Programme::findOrFail($id);
        return view('admin.programmes.edit', compact('programme'));
    }

    public function update(Request $request, $id)
    {
        $programme = Programme::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'required|in:ouvert,ferme,a_venir',
        ]);

        $programme->update($request->all());
        return redirect()->route('admin.programmes.index')->with('success', 'Programme mis à jour !');
    }

    public function destroy($id)
    {
        Programme::destroy($id);
        return redirect()->route('admin.programmes.index')->with('success', 'Programme supprimé !');
    }
}
