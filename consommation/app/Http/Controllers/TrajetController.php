<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use App\Models\Voiture;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function index()
    {
        $trajets = Trajet::with('voiture')->orderBy('date', 'desc')->get();
        $voitures = Voiture::all();

        return view('trajets.index', compact('trajets', 'voitures'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_voiture' => 'required|exists:voitures,id',
            'date' => 'required|date',
            'type_trajet' => 'required|string',
            'destination' => 'required|string',
            'vitesse_moyenne' => 'required|integer',
            'consommation_moyenne' => 'required|integer',
            'energie_recuperee' => 'required|integer',
            'consommation_climatisation' => 'required|integer',
        ]);

        Trajet::create($validated);


        return redirect()->back()->with('success', 'Trajet ajouté avec succès.');
    }
}
