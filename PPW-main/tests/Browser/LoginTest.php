<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Dusk per test di login utente --- Realizzato da Antonio Gravina
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') //Vai su pagina di login
                ->assertSee('Login')  //Si aspetta di leggere Login sulla pagina
                ->type('email', 'test@test.com') //Inserimento credenziali
                ->type('password', 'password') //Inserimento password
                ->press('Accedi'); //Premi su "Accedi"

        });
    }
}
