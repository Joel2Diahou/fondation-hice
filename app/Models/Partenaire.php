<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'logo_url',
        'site_web',
        'description_fr',
        'description_en',
        'type'
    ];
}
