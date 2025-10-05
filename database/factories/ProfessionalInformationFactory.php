<?php

namespace Database\Factories;

use App\Models\HealthCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfessionalInformation>
 */
class ProfessionalInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $firstYear = fake()->year();
        return [
        'health_card_id' => HealthCard::factory(),
        'school_district_division' => fake()->randomElement(['SGOD','ASINAN ES', 'TAPINAC ES', 'AHES']),
        'position_designation' =>fake()->randomElement(['COS', 'CASUAL', 'NTP', 'TP', 'PERMANENT']),
        'first_year_in_service' => $firstYear,
        'years_in_service' => (2025 - $firstYear),
        ];
    }
}
