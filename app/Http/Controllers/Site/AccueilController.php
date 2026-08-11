<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\Actualite;
use App\Models\Partenaire;
use App\Models\Temoignage;
use App\Models\Evenement;
use App\Models\Video;

class AccueilController extends Controller
{
    public function index()
    {
        $programmes = Programme::where('statut', 'ouvert')->limit(3)->get();
        $actualites = Actualite::where('est_publie', true)->limit(3)->get();
        $partenaires = Partenaire::all();
        $temoignages = Temoignage::where('est_visible', true)->get();
        $evenements = Evenement::where('date_debut', '>=', now())->limit(3)->get();
        $videos = Video::where('est_publie', true)->limit(4)->get();

        return view('site.accueil', compact(
            'programmes',
            'actualites',
            'partenaires',
            'temoignages',
            'evenements',
            'videos'
        ));
    }
}
