<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use App\Models\Recharge;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trajets = Trajet::orderBy('date')->get();
        $recharges = Recharge::orderBy('trajet_id')->get();

        $totalDistance = $trajets->sum('distance');
        $totalCost = $recharges->sum('cout'); // si tu stockes cout dans recharges
        $totalEnergyRecovered = $trajets->sum('energie_recuperee');
        $averageBattery = round($trajets->avg('pourcentage_batterie'), 2);

        $trajetDates = $trajets->pluck('date')->map(function ($d) {
            return \Carbon\Carbon::parse($d)->format('d/m');
        });
        $batteryValues = $trajets->pluck('pourcentage_batterie');
        $costValues = $recharges->pluck('cout');
        $consumptionValues = $trajets->pluck('consommation_moyenne');
        $ratioValues = $recharges->pluck('ratio_batterie');

        $typesCount = $trajets->groupBy('type')->map->count();
        $labels = $typesCount->keys();
        $values = $typesCount->values();


        return view('dashboard.index', compact(
            'totalDistance',
            'totalCost',
            'totalEnergyRecovered',
            'averageBattery',
            'trajetDates',
            'batteryValues',
            'costValues',
            'consumptionValues',
            'ratioValues',
            'typesCount',
            'labels',
            'values'
        ));
    }
}
