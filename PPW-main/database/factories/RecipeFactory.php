<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Scritto da: Marco Pernisco
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'association_id' => fake()->unique(),
        'user_id' => fake()->unique(),
        'name' => fake()->name(),
        'type' => fake()->name(),
        'ingredients' => Str::random(10),
        'description' => Str::random(255),
        ];
    }
}
