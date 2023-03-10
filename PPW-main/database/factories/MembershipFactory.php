<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Scritto da: Antonio Gravina
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake(),
            'association_id' => fake(),
            'token' => fake(),
            'verified' => fake(),
            'moderator' => fake(),
            'created_at' => fake()->date("Y-m-d H:i:s"),
        ];
    }
}
