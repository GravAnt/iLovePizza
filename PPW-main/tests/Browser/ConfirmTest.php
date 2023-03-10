<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ConfirmTest extends DuskTestCase
{
    /**
     * Dusk per pagina di conferma azione --- Realizzato da Marco Pernisco
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/confirm') //Visita pagina di conferma
                    ->assertSee('Operazione Confermata') //Legge titolo pagina
                    ->press('Ritorna alla home'); //Premi button
        });
    }
}
