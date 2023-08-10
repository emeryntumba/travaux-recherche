<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travail extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'auteur',
        'directeur',
        'encadreur',
        'theme',
        'type_travail',
        'annee_publication',
        'file'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
