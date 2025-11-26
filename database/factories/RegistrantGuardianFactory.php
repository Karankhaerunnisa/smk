<?php

namespace Database\Factories;

use App\Models\Registrant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrantGuardian>
 */
class RegistrantGuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registrant_id' => Registrant::inRandomOrder()->first()->id ?? Registrant::factory(),
            'relationship' => $this->faker->randomElement(['father', 'mother', 'guardian']),
            'name' => $this->faker->name(),
            'job' => $this->faker->jobTitle(),
            'phone' => $this->faker->phoneNumber(),
            // Matching the Enum values we discussed (range_1, range_2, etc.)
            'income_range' => $this->faker->randomElement(['range_1', 'range_2', 'range_3', 'range_4', 'range_5']),
        ];
    }
}
