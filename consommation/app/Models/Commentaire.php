<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    public function trajets()
    {
        return $this->hasMany(Trajet::class, 'id_commentaire');
    }

    public function recharges()
    {
        return $this->hasMany(Recharge::class, 'id_commentaire');
    }
}
