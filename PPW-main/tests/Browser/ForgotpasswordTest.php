<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ForgotpasswordTest extends DuskTestCase
{
    /**
     * Dusk dedicato al test per reindirizzamento pagina di recupero password --- Realizzato da Antonio Gravina
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //Visita pagina di login
                ->assertSee('Login') //Leggi titolo pagina
                ->press('Password dimenticata') 
                ->assertSee('Recupera l\'account'); //Visita pagina di recupero password
        });
    }
}
