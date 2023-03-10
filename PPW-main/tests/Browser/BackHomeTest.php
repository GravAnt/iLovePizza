<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BackHomeTest extends DuskTestCase
{
    /**
     * Dusk per testare il ritorno alla homepage da pagina tipologia pizza --- Realizzato da Marco Pernisco
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Visita la homepage
                ->assertSee('I love pizza'); // Verifica pagina di homepage

            if ($browser->seeLink('/pizzas/1')) {

                $browser->clickLink('/pizzas/1') // Click sul link per pagina tipologia pizza
                    ->assertSee('Pizza Margherita'); // Verifica pagina tipologia pizza 

                if ($browser->seeLink('/')) { // Se c'è il link disponibile per ritornare alla Homepage

                    $browser->clickLink('/')  // Clicca sul link
                        ->assertSee('I love pizza'); // Verifica di Homepage
                }
            }
        });
    }
}
