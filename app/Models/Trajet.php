<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonInterval;
use App\Models\Batterie;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'action',
        'destination',
        'km',
        'batterie_id',
        'autonomie',
        'type',
        'reset',
        'distance',
        'vitesse_moyenne',
        'consommation_moyenne',
        'consommation_totale',
        'energie_recuperee',
        'consommation_clim'
    ];
    public function batterie()
    {
        return $this->belongsTo(Batterie::class, 'batterie_id');
    }
    public $timestamps = false;

    public function distance()
    {
        $trajetPrecedent = self::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();
        $distance = $trajetPrecedent ? $this->km - $trajetPrecedent->km : null;

        return $distance;
    }

    public function nbkw()
    {
        $trajetPrecedent = self::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();

        return $trajetPrecedent ? $this->consommation_totale - $trajetPrecedent->consommation_totale : null;

    }
    public function kwh100km()
    {
        $trajetPrecedent = self::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();

        $distance = $trajetPrecedent ? $this->distance - $trajetPrecedent->distance : null;

        return $distance ? round(($this->nbkw() / $distance) * 100, 2) : "#DIV/0!";

    }
    public function vitesseMoyenne()
    {

        $trajetPrecedent = self::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();

        $distance = $trajetPrecedent ? $this->distance - $trajetPrecedent->distance : null;

        return $distance ? round($distance / (($this->distance / $this->vitesse_moyenne) - ($trajetPrecedent->distance / $trajetPrecedent->vitesse_moyenne)), 2) : "#DIV/0!";
    }

    public function durée()
    {
        $trajetPrecedent = self::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();

        $distance = $trajetPrecedent ? $this->distance - $trajetPrecedent->distance : null;

        return $distance ? CarbonInterval::seconds(($distance / $this->vitesseMoyenne()) * 3600)->cascade()->format('%H:%I:%S') : "#DIV/0!";
    }
    public function consoTotDistance()
    {
        if ($this->reset) {
            $trajetPrecedent = self::where('id', '<', $this->id)
                ->orderBy('id', 'desc')
                ->first();
            $distance = $trajetPrecedent ? $this->distance - $trajetPrecedent->distance : null;

            return round(($this->consommation_totale * 100 / $distance), 2);
        }
        return round(($this->consommation_totale * 100 / $this->distance), 2);
    }


}
