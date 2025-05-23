<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doleance extends Model
{
    // Champs autorisés à l'assignation de masse
   protected $fillable = [
    'titre',
    'description',
    'etat',
    'user_id',
    'decision',
    'pv',
];


    // Relation many-to-many avec les réunions
    public function reunions()
    {
        return $this->belongsToMany(Reunion::class);
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
