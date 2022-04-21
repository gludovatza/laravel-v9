<?php

namespace Tests\Browser;

use App\Models\Flight;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PassengerTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_visitor_can_create_a_passenger()
    {
        Flight::factory()->count(3)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit('/passengers/create')
                    ->type('utasneve', 'Attila') // input mező name attribútum értéke
                    ->select('repulojarata')
                    //->click('input[type="submit"]')
                    ->click('@save-button')
                    ->assertSee('Attila 2');

        });
    }
}
