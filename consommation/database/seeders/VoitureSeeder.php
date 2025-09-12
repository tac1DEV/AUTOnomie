<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voiture;

class VoitureSeeder extends Seeder
{
    public function run(): void
    {
        Voiture::factory()->count(5)->create();
    }
}
