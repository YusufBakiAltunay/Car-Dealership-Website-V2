<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Database\Factories\CarModelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarModel::factory()->times(10)->create();
    }
}
