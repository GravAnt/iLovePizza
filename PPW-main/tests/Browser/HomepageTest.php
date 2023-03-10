<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
//--- Realizzato da Marco Pernisco, Antonio Gravina, Mattia Siragusa
class HomepageTest extends DuskTestCase
{
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') //Visita la Homepage
                    ->assertSee('I love pizza');  //Legge titolo pagina
        });
    }
}
