<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class CommentaireSeeder extends Seeder
{
    public function run(): void
    {
        Commentaire::factory()->count(10)->create();
    }
}
