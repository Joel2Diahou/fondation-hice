<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'nom_complet',
        'email',
        'telephone',
        'age',
        'ville',
        'motivation_fr',
        'motivation_en',
        'cv_url',
        'statut',
        'date_candidature'
    ];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
