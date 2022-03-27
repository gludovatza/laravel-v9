<?php

namespace Tests\Feature;

use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FlightsTest extends TestCase
{
    use RefreshDatabase;

    public function test_flight_factory()
    {
        // $flight = Flight::factory()->create();

        $attribute = ['name' => 'Test Flight'];

        $flight = Flight::factory()->create($attribute);

        $response = $this->get('/flights/' . $flight->id);

        $response->assertOk();

        $response->assertSee('Test Flight');
    }
}
