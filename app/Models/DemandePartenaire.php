<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandePartenaire extends Model
{
    use HasFactory;

    protected $table = 'demandes_partenaires';

    protected $fillable = [
        'entreprise',
        'nom_contact',
        'email',
        'telephone',
        'ville',
        'message',
        'type_partenariat',
        'traite'
    ];
}
