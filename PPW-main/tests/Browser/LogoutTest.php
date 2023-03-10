<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * Dusk per procedimento di login e successivamente logout --- Realizzato da Antonio Gravina
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/login') //Vai su pagina di login
                ->assertSee('Login')  //Si aspetta di leggere Login sulla pagina
                ->type('email', 'test@test.com') //Inserimento credenziali
                ->type('password', 'password')
                ->press('Accedi'); //Premi su "Accedi"

                // creiamo in if per controllare se il browser vede il link di logout, se c'è lo preme per eseguire il logout
                if ($browser->seeLink('/logout')) {  

                        $browser->clickLink('/logout');
                }
                
        });
    }
}
