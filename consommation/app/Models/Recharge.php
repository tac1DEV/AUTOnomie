<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'duree',
        'kw_charge',
        'prix_kwh',
        'pu_chrg_kwh',
        'cout',
        'pourcentage_batterie',
        'ratio_batterie',
        'commentaire'
    ];

    public $timestamps = false;
}
