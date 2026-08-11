<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.contact');
    }

    public function envoyer(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Demande::create([
            'type' => 'contact',
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'entreprise' => $request->entreprise,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Votre message a été envoyé !');
    }
}
