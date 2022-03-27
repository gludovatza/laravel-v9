<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_contact_page()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_flights_page()
    {
        $response = $this->get('/flights');

        $response->assertStatus(200);
    }

    public function test_welcome_page()
    {
        $response = $this->get('/');

        $response->assertViewIs('welcome');

        $response->assertSee('Home');
    }
}
