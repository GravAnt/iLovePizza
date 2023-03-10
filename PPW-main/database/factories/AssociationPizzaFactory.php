<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Scritto da: Antonio Gravina
 */
class AssociationPizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'association_id' => fake(),
            'pizza_id' => fake(),
        ];
    }
}
