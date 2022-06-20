<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarque extends Model
{
    use HasFactory;

    protected $fillable = [
        'plaintes_id',
        'numero_remarques'
    ];
}
