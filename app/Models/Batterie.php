<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonInterval;

class Batterie extends Model
{
    use HasFactory;

    protected $fillable = [
        'pourcentage'
    ];

    public function recharges()
    {
        return $this->hasMany(Recharge::class);
        // Une batterie peut avoir plusieurs recharges
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

    public $timestamps = false;

}
