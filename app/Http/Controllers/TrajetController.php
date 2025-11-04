<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function index()
    {
        $trajets = Trajet::orderBy('id', 'desc')->paginate(9);

        return view('trajets.index', compact('trajets'));
    }
    public function create()
    {
        $types = Trajet::distinct()->pluck('type');
        return view('trajets.create', compact('types'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'action' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'km' => 'required|integer|min:0',
            'pourcentage_batterie' => 'required|integer|min:0|max:100',
            'autonomie' => 'required|integer|min:0',
            'type' => 'required|string|max:3',
            'reset' => 'nullable|boolean',
            'distance' => 'required|integer|min:0',
            'vitesse_moyenne' => 'required|integer|min:0',
            'consommation_moyenne' => 'required|integer|min:0',
            'consommation_totale' => 'required|integer|min:0',
            'energie_recuperee' => 'required|integer|min:0',
            'consommation_clim' => 'required|integer|min:0',
            'commentaire' => 'nullable|string|max:255',
        ]);

        Trajet::create($validated);


        return redirect()->route('trajets.index')->with('success', 'Trajet crée avec succès.');
    }
    public function edit($id)
    {
        $types = Trajet::distinct()->pluck('type');
        $trajet = Trajet::findOrFail($id); // récupère le trajet ou renvoie 404
        return view('trajets.edit', compact('trajet', 'types'));
    }

    public function update(Request $request, $id)
    {
        $trajet = Trajet::findOrFail($id);


        $validated = $request->validate([
            'date' => 'required|date',
            'action' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'km' => 'required|integer|min:0',
            'pourcentage_batterie' => 'required|integer|min:0|max:100',
            'autonomie' => 'required|integer|min:0',
            'type' => 'required|string|max:3',
            'reset' => 'nullable|boolean',
            'distance' => 'required|numeric|min:0',
            'vitesse_moyenne' => 'required|numeric|min:0',
            'consommation_moyenne' => 'required|numeric|min:0',
            'consommation_totale' => 'required|numeric|min:0',
            'energie_recuperee' => 'required|numeric|min:0',
            'consommation_clim' => 'required|numeric|min:0',
            'commentaire' => 'nullable|string|max:255',
        ]);

        $trajet->update($validated);
        return redirect()->route('trajets.index')->with('success', 'Trajet mis à jour avec succès.');
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
