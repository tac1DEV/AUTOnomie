<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoitureFactory extends Factory
{
    protected $model = \App\Models\Voiture::class;

    public function definition(): array
    {
        return [
            'manufacturer' => $this->faker->randomElement(['Tesla', 'Renault', 'Nissan', 'BMW']),
            'model' => $this->faker->word(),
            'km' => $this->faker->numberBetween(0, 100000),
            'charge_batterie' => $this->faker->numberBetween(10, 100),
            'autonomie' => $this->faker->numberBetween(150, 500),
        ];
    }
}
