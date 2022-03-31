<?php

namespace Database\Seeders;

use App\Models\Luggage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LuggageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Luggage::factory()->count(50)->create();
    }
}
