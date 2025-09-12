<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commentaire;

class RechargeFactory extends Factory
{
    protected $model = \App\Models\Recharge::class;

    public function definition(): array
    {
        return [
            'duree' => $this->faker->numberBetween(15, 120),
            'kw_charge' => $this->faker->numberBetween(10, 100),
            'prix_kwh' => $this->faker->numberBetween(0.15, 0.40),
            'pu_charge_kwh' => $this->faker->numberBetween(0.20, 0.50),
            'cout' => $this->faker->numberBetween(5, 50),
            'pourcentage' => $this->faker->numberBetween(10, 100),
            'id_commentaire' => Commentaire::factory(),
        ];
    }
}
