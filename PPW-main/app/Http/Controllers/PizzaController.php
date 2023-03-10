<?php

namespace App\Http\Controllers;

use App\Models\Pizza;

/**
 * Scritto da: Mattia Siragusa
 */
class PizzaController extends Controller
{
    //Funzione che riporta all'homepage e mostra tutte le tipologie di pizze trattate dentro il carousel
    public function showHomepage()
    {
        $pizzas = Pizza::all();
        $pizzaNumber = $pizzas->count();
        $data = ['pizzas' => $pizzas, 'pizzaNumber' => $pizzaNumber];

        return view('homeViews.homepage', $data);
    }

    //Funzione che riporta alla pagina relativa ad un tipo di pizza e le associazioni che la trattano
    public function showPizza($pizza_id)
    {
        $pizza = Pizza::find($pizza_id);
        $associations = $pizza->associations;
        $data = [
            'pizza' => $pizza,
            'associations' => $associations,
        ];

        return view('homeViews.pizzas', $data);
    }
}