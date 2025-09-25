<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'action',
        'destination',
        'km',
        'pourcentage_batterie',
        'autonomie',
        'type',
        'reset',
        'distance',
        'vitesse_moyenne',
        'consommation_moyenne',
        'consommation_totale',
        'energie_recuperee',
        'consommation_clim',
        'id_commentaire',
    ];

    public $timestamps = false;

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class, 'id_commentaire');
    }

    public function distance()
    {
        $trajetPrecedent = self::where('date', '<', $this->date)
            ->orderBy('date', 'desc')
            ->first();
        $distance = $trajetPrecedent ? $this->km - $trajetPrecedent->km : null;

        return $distance == 0 || $distance === null ? 1 : $distance;
    }


    public function pourcentageBatterie()
    {
        $trajetPrecedent = self::where('date', '<', $this->date)
            ->orderBy('date', 'desc')
            ->first();

        return $trajetPrecedent ? $this->pourcentage_batterie - $trajetPrecedent->pourcentage_batterie : null;

    }
    public function nbKw()
    {
        $trajetPrecedent = self::where('date', '<', $this->date)
            ->orderBy('date', 'desc')
            ->first();

        return $trajetPrecedent ? $this->consommation_totale - $trajetPrecedent->consommation_totale : null;

    }
    public function kwh100km()
    {
        return $this->nbKw() / $this->distance();
    }
    // public function vitesseMoyenne()
    // {

    //     $trajetPrecedent = self::where('id_voiture', $this->id_voiture)
    //         ->where('created_at', '<', $this->created_at)
    //         ->orderBy('created_at', 'desc')
    //         ->first();

    //     return $trajetPrecedent ? $this->distance() / (($this->distance()) / ($this->vitesse_moyenne) - ($trajetPrecedent->distance() / $trajetPrecedent->vitesse_moyenne)) : null;
    // }

    public function durée()
    {
        return ($this->distance() / $this->vitesseMoyenne()) / 24;
    }
    public function consoTotDistance()
    {
        return $this->consommation_totale / $this->distance();
    }


}
