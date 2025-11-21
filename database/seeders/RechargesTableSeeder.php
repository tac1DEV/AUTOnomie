<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RechargesTableSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $prix = rand(20, 40) / 100; // entre 0.20 et 0.40 €/kWh
            $kw = rand(10, 70);
            $cout = $prix * $kw;

            DB::table('recharges')->insert([
                'date' => now()->subDays(rand(0, 30))->toDateString(),
                'duree' => sprintf('%02d:%02d:00', rand(0, 2), rand(0, 59)),
                'kw_charge' => $kw,
                'prix_kwh' => $prix,
                'pu_chrg_kwh' => rand(5, 30),
                'cout' => round($cout, 2),
                'ratio_batterie' => rand(20, 100),
                'commentaire' => fake()->sentence(4),
            ]);
        }
    }

}
