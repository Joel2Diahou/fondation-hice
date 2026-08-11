<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'nom',
        'email',
        'telephone',
        'entreprise',
        'message',
        'traite'
    ];
}
