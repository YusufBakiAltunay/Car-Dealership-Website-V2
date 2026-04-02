<?php

namespace Database\Seeders;

use App\Models\PriceCar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PriceCar::factory()->times(10)->create();
    }
}
