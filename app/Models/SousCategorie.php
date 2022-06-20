<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'nom_souscategorie',
        'commentaire_souscategorie'
    ];
}