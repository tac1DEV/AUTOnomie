<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = ['manufacturer', 'model', 'km', 'charge_batterie', 'autonomie'];

    public function trajets()
    {
        return $this->hasMany(Trajet::class, 'id_voiture');
    }
}
