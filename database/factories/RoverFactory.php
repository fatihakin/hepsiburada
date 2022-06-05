<?php

namespace Database\Factories;

use App\Models\Plateau;
use App\Models\Rover;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rover>
 */
class RoverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $plateau = Plateau::query()->inRandomOrder()->firstOrFail();
        return [
            'name' => $this->faker->unique()->name,
            'plateau_id' => $plateau->id,
            'x_coordinate' => $this->faker->numberBetween(0,$plateau->x_coordinate),
            'y_coordinate' => $this->faker->numberBetween(0,$plateau->y_coordinate),
            'facing' => Rover::FACING_TYPES[rand(0,3)],
        ];
    }
}
