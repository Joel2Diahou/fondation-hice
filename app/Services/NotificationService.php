<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\Projet;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    /**
     * Envoyer un email au candidat
     */
    public function sendEmail($projet, $sujet, $message)
    {
        try {
            Mail::raw($message, function ($mail) use ($projet, $sujet) {
                $mail->to($projet->email)
                     ->subject($sujet)
                     ->from(env('MAIL_FROM_ADDRESS'), 'FONDATION HICE');
            });

            $this->saveNotification($projet->id, 'email', $projet->email, $message, 'envoye');

            return ['success' => true, 'message' => 'Email envoyé avec succès'];
        } catch (\Exception $e) {
            $this->saveNotification($projet->id, 'email', $projet->email, $message, 'erreur');
            return ['success' => false, 'message' => 'Erreur: ' . $e->getMessage()];
        }
    }

    /**
     * Sauvegarder la notification en base de données
     */
    private function saveNotification($projetId, $type, $destinataire, $message, $statut)
    {
        Notification::create([
            'projet_id' => $projetId,
            'type' => $type,
            'destinataire' => $destinataire,
            'message' => $message,
            'statut' => $statut
        ]);
    }
}
