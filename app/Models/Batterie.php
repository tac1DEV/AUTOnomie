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
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

    public $timestamps = false;

    protected $table = 'batteries';

    public function previous()
    {
        return self::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function difference()
    {
        $prev = $this->previous();
        if ($prev) {
            return $this->pourcentage - $prev->pourcentage;
        }
        return null;
    }

    public static function allWithDifferences()
    {
        $batteries = self::orderBy('id', 'asc')->get();
        $previous = null;
        foreach ($batteries as $battery) {
            $battery->difference = $previous ? $battery->pourcentage - $previous->pourcentage : null;
            $previous = $battery;
        }
        return $batteries;
    }
}
