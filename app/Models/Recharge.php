<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batterie;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'km',
        'duree',
        'kw_charge',
        'prix_kwh',
        'pu_chrg_kwh',
        'cout',
        'ratio_batterie',
        'commentaire',
        'batterie_id'
    ];

    public function batterie()
    {
        return $this->belongsTo(Batterie::class, 'batterie_id');
    }

    public $timestamps = false;
}
