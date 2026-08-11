<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::where('est_publie', true)->paginate(10);
        return view('site.actualites.index', compact('actualites'));
    }

    public function show($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('site.actualites.show', compact('actualite'));
    }
}
