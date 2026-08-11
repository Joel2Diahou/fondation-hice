<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'objectifs',
        'duree',
        'public_cible',
        'date_debut',
        'date_fin',
        'statut',
        'image_url'
    ];

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
}
