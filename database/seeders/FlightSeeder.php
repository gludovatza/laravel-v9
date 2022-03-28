<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Flight;
use App\Models\Airline;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Airline::factory()->count(10)->create();
        City::factory()->count(5)->create();
        Flight::factory()->count(20)->create();
    }
}
