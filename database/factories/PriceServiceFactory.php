<?php

namespace Database\Factories;

use App\Models\GarageService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceGarageService>
 */
class PriceServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 2, 100),
            'effdate' => Carbon::today()->subDays(random_int(0, 365)),
            'garage_service_id' => GarageService::all()->random()->id,
        ];
    }
}
 