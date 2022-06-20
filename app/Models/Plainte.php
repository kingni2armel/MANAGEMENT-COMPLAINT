<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'souscategorie_id',
        'pays',
        'detail_plainte',
        'statut_plainte',
        'file'

    ];
}
