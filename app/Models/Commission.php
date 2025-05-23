<?php

namespace App\Models;
use App\Models\Membre;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'date_creation',
        'date_fin',
   
    ];
   
    public function membres()
    {
        return $this->hasMany(Membre::class, 'commission_id');
    }
  
}
