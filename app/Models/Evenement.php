<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_fr',
        'titre_en',
        'description_fr',
        'description_en',
        'date_debut',
        'date_fin',
        'lieu',
        'image_url',
        'lien_inscription'
    ];
}
