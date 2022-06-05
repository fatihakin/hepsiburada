<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plateau>
 */
class PlateauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'x_coordinate' => $this->faker->numberBetween(0,1000),
            'y_coordinate' => $this->faker->numberBetween(0,1000),
        ];
    }
}
