<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
    public function test()
    {
        try {
            Mail::raw('Test d\'envoi d\'email depuis la Fondation HICE', function ($message) {
                $message->to('diahoujoel750@gmail.com')
                        ->subject('Test Email - Fondation HICE')
                        ->from(env('MAIL_FROM_ADDRESS'), 'FONDATION HICE');
            });
            return "✅ Email envoyé avec succès !";
        } catch (\Exception $e) {
            return "❌ Erreur : " . $e->getMessage();
        }
    }
}
