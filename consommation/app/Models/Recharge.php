<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'trajet_id',
        'duree',
        'kw_charge',
        'prix_kwh',
        'pu_chrg_kwh',
        'cout',
        'ratio_batterie'
    ];

    public $timestamps = false;
}
