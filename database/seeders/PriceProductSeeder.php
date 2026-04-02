<?php

namespace Database\Seeders;

use App\Models\PriceProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PriceProduct::factory()->times(10)->create();
    }
}
