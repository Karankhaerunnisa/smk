<?php

namespace Database\Factories;

use App\Models\Registrant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrantAcademic>
 */
class RegistrantAcademicFactory extends Factory
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
            'school_name' => 'SMP ' . $this->faker->company(),
            'graduation_year' => $this->faker->year(),
            'math_score' => $this->faker->randomFloat(2, 60, 100),
            'indonesian_score' => $this->faker->randomFloat(2, 60, 100),
            'english_score' => $this->faker->randomFloat(2, 60, 100),
            'science_score' => $this->faker->randomFloat(2, 60, 100),
            'average_score' => function (array $attributes) {
                return ($attributes['math_score'] + $attributes['indonesian_score'] + $attributes['english_score'] + $attributes['science_score']) / 4;
            },
        ];
    }
}
