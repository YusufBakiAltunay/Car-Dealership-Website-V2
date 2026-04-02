<?php

namespace Database\Seeders;

use App\Models\GarageService;
use App\Models\PriceService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GarageServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GarageService::factory()->count(20)->has(PriceService::factory(3), 'prices')->create();
    }
}

 