<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'photo_url',
        'texte_fr',
        'texte_en',
        'fonction',
        'est_visible'
    ];
}
