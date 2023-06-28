<?php

namespace Database\Factories;

use App\Models\Ship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treasure>
 */
class TreasureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->text(),
            'weight' => rand(5,30),
            'price' => fake()->randomNumber(4),
            'condition' => rand(50,52),
            'ship_id' => Ship::all()->random()->id,
        ];
    }
}
