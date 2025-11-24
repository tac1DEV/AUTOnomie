<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TrajetsTableSeeder extends Seeder
{
    public function run(): void
    {
        $cumulKm = 0;
        $types = ['AB', 'QZ', 'MF', 'KL', 'TY'];

        for ($i = 0; $i < 100; $i++) {
            $distance = rand(10, 500); // distance aléatoire pour ce trajet
            $cumulKm += $distance; // cumul des km

            $type = $types[array_rand($types)];

            DB::table('trajets')->insert([
                'date' => now()->subDays(rand(0, 365))->toDateString(),
                'action' => ['Départ', 'Arrivée', 'Pause'][array_rand(['Départ', 'Arrivée', 'Pause'])],
                'destination' => ['Paris', 'Lyon', 'Marseille', 'Nice', 'Toulouse'][array_rand(['Paris', 'Lyon', 'Marseille', 'Nice', 'Toulouse'])],
                'distance' => $distance,
                'km' => $cumulKm, // km cumulatif
                'autonomie' => rand(100, 500),
                'type' => $type,
                'reset' => rand(0, 1),
                'vitesse_moyenne' => rand(60, 130),
                'consommation_moyenne' => rand(10, 20),
                'consommation_totale' => rand(10, 30),
                'energie_recuperee' => rand(0, 5),
                'consommation_clim' => rand(0, 2),
            ]);
        }
    }


}
