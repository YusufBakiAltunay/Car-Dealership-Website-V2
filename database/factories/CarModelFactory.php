<?php

namespace Database\Factories;


use App\Models\Brand;
use App\Models\FuelType;
use App\Models\PriceCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarModel>
 */
class CarModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'brand_id' => Brand::all()->random()->id,
        ];
    }
}
