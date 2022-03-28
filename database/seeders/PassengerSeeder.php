<?php

namespace Database\Seeders;

use App\Models\Passenger;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Passenger::factory()->count(100)->create();
    }
}
