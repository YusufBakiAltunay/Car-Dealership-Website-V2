<?php

namespace Database\Factories;

use App\Models\CarModel;
use App\Models\FuelType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'acceleration' => $this->faker->numberBetween(1, 1000),
            'horsepower' => $this->faker->numberBetween(1, 3000),
            'top_speed' => $this->faker->numberBetween(1, 1000),
            'length' => $this->faker->numberBetween(1, 10000),
            'width' => $this->faker->numberBetween(1, 10000),
            'height' => $this->faker->numberBetween(1, 10000),
            'max_load' => $this->faker->numberBetween(1, 10000),
            'stock' => $this->faker->numberBetween(1, 10000),
            'car_model_id' => CarModel::All()->random()->id,
            'fuel_type_id' => FuelType::All()->random()->id,
        ];
    }
}
