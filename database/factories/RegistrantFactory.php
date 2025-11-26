<?php

namespace Database\Factories;

use App\Models\Major;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registrant>
 */
class RegistrantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Automatically create a user for this registrant if one isn't passed
            'user_id' => User::factory()->state(['role' => 'student']),

            // Pick a random existing Major
            'major_id' => Major::inRandomOrder()->first()->id ?? Major::factory(),

            'registration_number' => 'REG-' . $this->faker->unique()->numerify('##########'),
            'nisn' => $this->faker->unique()->numerify('##########'),
            'nik' => $this->faker->unique()->numerify('################'),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date('Y-m-d', '-15 years'), // Approx high school age
            'gender' => $this->faker->randomElement(['male', 'female']),
            'religion' => $this->faker->randomElement(['islam', 'christianity', 'catholicism', 'hinduism', 'buddhism', 'confucianism']),
            'status' => $this->faker->randomElement(['pending', 'verified', 'accepted', 'rejected']),
        ];
    }
}
