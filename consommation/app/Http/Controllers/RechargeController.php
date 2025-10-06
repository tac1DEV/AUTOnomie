<?php

namespace App\Http\Controllers;
use App\Models\Recharge;
use App\Models\Trajet;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    public function index()
    {
        $recharges = Recharge::orderBy('id', 'desc')->paginate(9);

        return view('recharges.index', compact('recharges'));
    }

    public function create($id)
    {
        $trajet = Trajet::findOrFail($id);
        return view('recharges.create', compact('trajet'));
    }
    public function show($id)
    {
        $recharge = Recharge::findOrFail($id);
        return view('recharges.show', compact('recharge'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trajet_id' => 'required|numeric',
            'duree' => ['required', 'date_format:H:i:s'],
            'kw_charge' => 'required|numeric|min:0',
            'prix_kwh' => 'required|numeric|min:0',
        ]);

        $exists = Recharge::where('trajet_id', $validated['trajet_id'])
            ->exists();

        if ($exists) {
            return redirect()->back()->withInput()->with('error', 'Cette recharge existe déjà.');
        }

        $dureeSecondes = strtotime($validated['duree']) - strtotime('00:00:00');
        $dureeHeures = $dureeSecondes / 3600;

        $validated['pu_chrg_kwh'] = round($validated['kw_charge'] / max($dureeHeures, 0.001), 3);
        $validated['cout'] = round($validated['pu_chrg_kwh'] * $validated['kw_charge'], 2);
        $recharge = Recharge::create($validated);

        if ($recharge) {
            return redirect()->route('recharges.index')->with('success', 'Recharge créée avec succès.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Erreur lors de la création de la recharge.');
        }
    }

    public function edit($id)
    {
        $recharge = Recharge::findOrFail($id); // récupère le Recharge ou renvoie 404
        return view('recharges.edit', compact('recharge'));
    }

    public function update(Request $request, $id)
    {
        $recharge = Recharge::findOrFail($id);


        $validated = $request->validate([
            'duree' => ['required', 'date_format:H:i:s'],
            'kw_charge' => 'required|numeric',
            'prix_kwh' => 'required|numeric',
        ]);


        $dureeSecondes = strtotime($validated['duree']) - strtotime('00:00:00');
        $dureeHeures = $dureeSecondes / 3600;

        $validated['pu_chrg_kwh'] = round($validated['kw_charge'] / max($dureeHeures, 1), 3);

        $validated['cout'] = round($validated['prix_kwh'] * $validated['kw_charge'], 2);

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
