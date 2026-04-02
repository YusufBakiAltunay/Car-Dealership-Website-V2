<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\PriceCar;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()->times(20)->has(PriceCar::factory(3), 'prices')->create();
    }
}
