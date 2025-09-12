<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_voiture',
        'date',
        'type_trajet',
        'destination',
        'vitesse_moyenne',
        'consommation_moyenne',
        'energie_recuperee',
        'consommation_climatisation',
        'id_commentaire'
    ];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'id_voiture');
    }

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class, 'id_commentaire');
    }
}
