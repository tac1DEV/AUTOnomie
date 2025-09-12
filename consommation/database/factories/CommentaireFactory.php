<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaireFactory extends Factory
{
    protected $model = \App\Models\Commentaire::class;

    public function definition(): array
    {
        return [
            'message' => $this->faker->sentence(),
        ];
    }
}
