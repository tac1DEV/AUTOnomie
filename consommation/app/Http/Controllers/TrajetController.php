<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use App\Models\Voiture;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function index()
    {
        $trajets = Trajet::with('voiture')->orderBy('created_at', 'desc')->get();
        $voitures = Voiture::all();

        return view('trajets.index', compact('trajets', 'voitures'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_voiture' => 'required|exists:voitures,id',
            'date' => 'required|date',
            'action' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'km' => 'required|integer|min:0',
            'pourcentage_batterie' => 'required|integer|min:0|max:100',
            'autonomie' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'vitesse_moyenne' => 'required|integer|min:0',
            'consommation_moyenne' => 'required|integer|min:0',
            'consommation_totale' => 'required|integer|min:0',
            'energie_recuperee' => 'required|integer|min:0',
            'consommation_climatisation' => 'required|integer|min:0',
        ]);

        Trajet::create($validated);


        return redirect()->back()->with('success', 'Trajet ajouté avec succès.');
    }
    public function destroy($id)
    {
        // Récupère le trajet par son ID
        $trajet = Trajet::find($id);

        if (!$trajet) {
            return redirect()->back()->with('error', 'Trajet non trouvé.');
        }

        // Supprime le trajet
        $trajet->delete();

        return redirect()->back()->with('success', 'Trajet supprimé avec succès.');
    }


}
