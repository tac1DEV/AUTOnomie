<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Voiture;
use App\Models\Commentaire;

class TrajetFactory extends Factory
{
    protected $model = \App\Models\Trajet::class;

    public function definition(): array
    {
        return [
            'id_voiture' => Voiture::all()->random()->id,
            'date' => $this->faker->dateTimeThisYear(),
            'type_trajet' => $this->faker->randomElement(['urbain', 'autoroute', 'mixte']),
            'destination' => $this->faker->city(),
            'vitesse_moyenne' => $this->faker->numberBetween(30, 120),
            'consommation_moyenne' => $this->faker->numberBetween(10, 25),
            'energie_recuperee' => $this->faker->numberBetween(0, 10),
            'consommation_climatisation' => $this->faker->numberBetween(0, 5),
            'id_commentaire' => Commentaire::factory(),
        ];
    }
}
