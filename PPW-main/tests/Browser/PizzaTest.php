<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PizzaTest extends DuskTestCase
{
    /** 
     *  Dusk per test su pagina tipi di pizza --- Realizzato da Mattuia Siragusa
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // Visita Homepage
                    ->assertSee('I love pizza'); // Verifica Homepage

                if ($browser->seeLink('/pizzas/1')) {   // Se link pagina disponibile

                    $browser->clickLink('/pizzas/1')  // Click sul link
                            ->assertSee('Pizza Margherita'); // Verifica pagina pizza
                }
        });
    }
}
