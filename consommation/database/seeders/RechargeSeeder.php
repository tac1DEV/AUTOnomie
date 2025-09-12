<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recharge;

class RechargeSeeder extends Seeder
{
    public function run(): void
    {
        Recharge::factory()->count(15)->create();
    }
}
