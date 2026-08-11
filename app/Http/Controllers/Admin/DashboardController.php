<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\Actualite;
use App\Models\Candidature;
use App\Models\Partenaire;
use App\Models\Demande;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programmes' => Programme::count(),
            'actualites' => Actualite::count(),
            'candidatures' => Candidature::count(),
            'partenaires' => Partenaire::count(),
            'demandes' => Demande::count(),
        ];

        $dernieresCandidatures = Candidature::with('programme')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'dernieresCandidatures'));
    }
}
