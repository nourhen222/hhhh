<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table = 'commission_members'; // 👈 ajoute ça pour dire à Laravel d'utiliser la bonne table

    // si tu veux aussi préciser les colonnes autorisées :
  

    protected $fillable = ['user_id', 'statut','commission_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }
    public function commission()
    {
        return $this->belongsTo(Commission::class,'commission_id'); 
    }

}

    
