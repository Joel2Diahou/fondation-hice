<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'categorie',
        'image_url',
        'auteur',
        'date_publication',
        'est_publie'
    ];
}
