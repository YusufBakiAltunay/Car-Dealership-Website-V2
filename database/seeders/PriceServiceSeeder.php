<?php

namespace Database\Seeders;

use App\Models\PriceService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PriceService::factory()->times(10)->create();
    }
}
