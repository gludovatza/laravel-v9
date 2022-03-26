<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\Captain;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => $this->faker->word(),
            'name' => $this->faker->userName(),
            'price' => $this->faker->numberBetween(1000, 9000),
            'captain_id' => 1,
            'airline_id' => Airline::factory()->create(),
        ];
    }
}
