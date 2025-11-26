<?php

namespace App\Http\Controllers;
use App\Models\Trajet;
use App\Models\Recharge;

class HomeController extends Controller
{
    public function index()
    {
        $trajets = Trajet::with('batterie')->orderBy('id', 'desc')->get();
        $recharges = Recharge::with('batterie')->orderBy('id', 'desc')->get();
        $concats = $trajets->concat($recharges)->sortByDesc('date')->sortByDesc('km')->all();
        $tableColumns = [
            'Date',
            'Action',
            'Destination',
            'Km',
            'Batterie',
            'Batterie consommée',
            'Autonomie (km)',
            'Type de trajet',
            'Reset',
            'Distance (km)',
            'Vitesse moyenne (km/h)',
            'Conso moy. (kWh/100km)',
            'Conso tot. depuis raz (kWh)',
            'Énergie récup. (kWh)',
            'Conso clim. (kwh)',
            'Durée',
            'KW charge',
            'Prix KWh',
            'Puissance (kW/h)',
            'Coût',
            'Batterie chargée (total)',
            'Commentaire',
            'Actions'
        ];
        // dd($concats[0]);
        return view('home', compact('concats', 'tableColumns', 'trajets', 'recharges'));
    }

}
