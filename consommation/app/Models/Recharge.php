<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'duree',
        'kw_charge',
        'prix_kwh',
        'pu_charge_kwh',
        'cout',
        'pourcentage',
        'id_commentaire'
    ];

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class, 'id_commentaire');
    }
}
