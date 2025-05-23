<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $fillable = [
        'titre',
        'date',
        'heure',
        'lieu',
        'user_id', 
    ];

    public $timestamps = false;

    public function doleances()
    {
        return $this->belongsToMany(Doleance::class);
    }

public function membres()
{
    return $this->belongsToMany(Membre::class, 'reunion_members', 'reunions_id', 'commission_members_id', 'user_id');
}

}
