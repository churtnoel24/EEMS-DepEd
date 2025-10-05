<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthCard>
 */
class HealthCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'date' => fake()->date(),
        'name'=> fake()->name(),
        'date_of_birth' => fake()->date(),
        'age' => fake()->numberBetween(18, 60),
        'gender' => fake()->randomElement(['male','female']),
        'civil_status' => fake()->randomElement(['Single','Married','Widowed','Separated']),
        ];
    }
}
