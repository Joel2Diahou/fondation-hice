<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet_id',
        'type',
        'destinataire',
        'message',
        'statut',
        'reponse'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
