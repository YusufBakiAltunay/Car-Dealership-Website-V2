<?php

namespace Database\Factories;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceCar>
 */
class PriceCarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 500, 10000000),
            'effects' => Carbon::today()->subDays(random_int(0, 365)),
            'car_id' => Car::All()->random()->id,
        ];
    }
}
