<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Structure extends Authenticatable
{
protected $fillable = ['nom', 'description', 'responsable_id'];
}