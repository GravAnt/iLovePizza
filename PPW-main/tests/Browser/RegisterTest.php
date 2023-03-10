<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * Dusk per test registrazione utente --- Realizzato da Mattia Siragusa
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register') //Visita pagina di registrazione
                    ->assertSee('Registrati') //Legge titolo della pagina di registrazione
                    ->type('name', 'test')  //Inserisci Nome
                    ->type('email', 'test@test.com') //Inserisci email
                    ->type('password', 'password') //Inserisci password
                    ->type('password_confirmation', 'password') //Conferma password
                    ->press('Registrati');

        });
    }
}
