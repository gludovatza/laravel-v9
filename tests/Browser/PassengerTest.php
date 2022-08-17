<?php

namespace Tests\Browser;

use Carbon\Carbon;
use App\Models\Flight;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PassengerTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_visitor_can_create_a_passenger()
    {
        Flight::factory()->count(3)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit('/passengers/create')
                    ->type('utasneve', 'Gludovátz Attila') // input mező name attribútum értéke
                    ->type('age', 32)
                    ->keys('#birthdate', '1990', '{tab}', '01', '01')
                    ->type('email', 'attila@gludovatz.hu')
                    ->type('phone', '20/123-4567')
                    ->select('repulojarata')
                    // ->click('input[type="submit"]')
                    ->click('@save-button')
                    ->assertSee('Gludovátz Attila');
        });
    }

    /** @test */
    public function a_visitor_cant_create_a_passenger_without_phone_number()
    {
        Flight::factory()->count(1)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit('/passengers/create')
                    ->type('utasneve', 'Érvénytelen János')
                    ->type('age', 22)
                    ->keys('#birthdate', '1999', '{tab}', '12', '31')
                    ->type('email', 'janos@invalid.hu')
                    // ->type('phone', '20/123-4567')
                    ->select('repulojarata')
                    ->click('@save-button');
                    // ->assertSee('Kérjük, töltse ki ezt a mezőt.');

            $message = $browser->script("return document.getElementById('phone').validationMessage")[0];
            $this->assertEquals('Kérjük, töltse ki ezt a mezőt.', $message);

            $browser->visit('/passengers')
                    ->assertDontSee('Érvénytelen János');
        });
    }

    /** @test */
    public function a_visitor_cant_create_a_passenger_with_too_short_name()
    {
        Flight::factory()->count(1)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit('/passengers/create')
                    ->type('utasneve', 'Kiss Imre')
                    ->type('age', 22)
                    ->keys('#birthdate', '1999', '{tab}', '12', '31')
                    ->type('email', 'imre@kiss.hu')
                    ->type('phone', '20/123-4567')
                    ->select('repulojarata')
                    ->click('@save-button')
                    //->assertSee('Kiss Imre');
                    ->assertSee('The utasneve must be at least 10 characters.');
        });
    }
}
