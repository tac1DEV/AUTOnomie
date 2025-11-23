<?php

namespace App\Http\Controllers;
use App\Models\Recharge;
use App\Models\Trajet;
use App\Models\Batterie;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    public function index()
    {
        $recharges = Recharge::with('batterie')->orderBy('id', 'desc')->paginate(50);

        return view('recharges.index', compact('recharges'));
    }

    public function create()
    {
        return view('recharges.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required', 'date'],
            'duree' => ['required', 'date_format:H:i'],
            'kw_charge' => ['required', 'numeric', 'min:0'],
            'prix_kwh' => ['required', 'numeric', 'min:0'],
            'pourcentage_batterie' => ['required', 'numeric', 'min:0'],
            'commentaire' => ['nullable', 'string', 'max:100'],
        ]);

        // Calcul pu_chrg_kwh
        $dureeSecondes = strtotime($validated['duree']) - strtotime('00:00:00');
        $dureeHeures = $dureeSecondes / 3600;

        $validated['pu_chrg_kwh'] = round($validated['kw_charge'] / max($dureeHeures, 0.001), 3);
        // pu_chrg_kwh

        // Calcul cout
        $validated['cout'] = round($validated['kw_charge'] * $validated['prix_kwh'], 2);
        // cout

        // Créer la recharge
        $recharge = Recharge::create($validated);


        if ($recharge) {
            return redirect()->route('recharges.index')->with('success', 'Recharge créée avec succès.');
        } else {
            // Pour ne pas perdre la progression du form
            return redirect()->back()->withInput()->with('error', 'Erreur lors de la création de la recharge.');
        }
    }


    public function edit($id)
    {
        $recharge = Recharge::findOrFail($id); // récupère la Recharge ou renvoie 404
        return view('recharges.edit', compact('recharge'));
    }

    public function update(Request $request, $id)
    {
        $recharge = Recharge::findOrFail($id);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'duree' => ['required', 'date_format:H:i'],
            'kw_charge' => ['required', 'numeric', 'min:0'],
            'prix_kwh' => ['required', 'numeric', 'min:0'],
            'pourcentage_batterie' => ['required', 'numeric', 'min:0'],
            'commentaire' => ['nullable', 'string', 'max:100'],
        ]);

        // Calcul pu_chrg_kwh
        $dureeSecondes = strtotime($validated['duree']) - strtotime('00:00:00');
        $dureeHeures = $dureeSecondes / 3600;

        $validated['pu_chrg_kwh'] = round($validated['kw_charge'] / max($dureeHeures, 0.001), 3);
        // pu_chrg_kwh

        // Calcul cout
        $validated['cout'] = round($validated['kw_charge'] * $validated['prix_kwh'], 2);
        // cout
        $recharge->update($validated);

        return redirect()->route('recharges.index')->with('success', 'Recharge mise à jour avec succès.');
    }


    public function destroy($id)
    {
        // Récupère le Recharge par son ID
        $recharge = Recharge::find($id);

        if (!$recharge) {
            return redirect()->back()->with('error', 'Recharge non trouvé.');
        }

        // Supprime le Recharge
        $recharge->delete();

        return redirect()->back()->with('success', 'Recharge supprimé avec succès.');
    }
}
