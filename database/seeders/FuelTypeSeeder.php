<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FuelType::factory()->create(['name' => 'Petrol']);
        FuelType::factory()->create(['name' => 'Diesel']);
        FuelType::factory()->create(['name' => 'Electric']);
        FuelType::factory()->create(['name' => 'Hybrid']);
    }
}
