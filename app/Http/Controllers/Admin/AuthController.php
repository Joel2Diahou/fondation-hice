<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $utilisateur = Utilisateur::where('email', $request->email)->first();

        if ($utilisateur && Hash::check($request->password, $utilisateur->password_hash)) {
            Session::put('admin_id', $utilisateur->id);
            Session::put('admin_nom', $utilisateur->nom);
            Session::put('admin_role', $utilisateur->role);
            return redirect()->route('admin.dashboard')->with('success', 'Bienvenue ' . $utilisateur->nom . ' !');
        }

        return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login')->with('success', 'Déconnecté avec succès');
    }
}
