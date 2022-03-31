<?php

namespace Database\Factories;

use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Luggage>
 */
class LuggageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => $this->faker->lexify('???') . "-" . $this->faker->numerify('###'), // példa: 'ABC-123'
            'passenger_id' => Passenger::inRandomOrder()->first()->id,
        ];
    }
}
