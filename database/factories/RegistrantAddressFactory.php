<?php

namespace Database\Factories;

use App\Models\Registrant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrantAddress>
 */
class RegistrantAddressFactory extends Factory
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
            'street_address' => $this->faker->streetAddress(),
            'rt' => $this->faker->numerify('0##'),
            'rw' => $this->faker->numerify('0##'),
            'village' => $this->faker->streetName(), // Approximate for Kelurahan
            'district' => $this->faker->citySuffix(), // Approximate for Kecamatan
            'city' => $this->faker->city(),
            'province' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
        ];
    }
}
