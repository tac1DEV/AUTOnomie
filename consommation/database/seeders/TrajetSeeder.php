<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trajet;

class TrajetSeeder extends Seeder
{
    public function run(): void
    {
        Trajet::factory()->count(20)->create();
    }
}
