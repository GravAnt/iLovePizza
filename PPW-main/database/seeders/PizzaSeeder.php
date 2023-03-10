<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Pizza;

/**
 * Scritto da: Mattia Siragusa
 */
class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Pizza::factory()->create([
            'name' => 'Pizza Margherita',
            'description' => "La Pizza Margherita è la pizza per eccellenza, la più famosa del mondo e un simbolo internazionale dell'italianità. La Pizza Margherita è la vera regina della cucina italiana. E a proposito di regina, la leggenda vuole che il nome derivi proprio dalla regina Margherita di Savoia, cui il cuoco Raffaele Esposito dedicò una pizza creata usando ingredienti del colore della bandiera italiana (il bianco della mozzarella, il rosso del pomodoro, il verde del basilico) e dandole il suo nome nel giugno del 1889."
         ]);

         Pizza::factory()->create([
            'name' => 'Pizza Diavola',
            'description' => "La pizza diavola è una delle pizze più gustose che si possano fare, nonostante la semplicità dei suoi ingredienti e la facilità del suo procedimento. Questa specialità nel menù delle pizzerie italiane viene spesso servita con salamino piccante e mozzarella, ma ne esistono diverse versioni che cambiano in base agli ingredienti aggiunti rispetto a quelli base."
         ]);

         Pizza::factory()->create([
            'name' => 'Pizza Napoli',
            'description' => "La pizza Napoli viene realizzata stendendo la pasta per la pizza, aggiungendo il pomodoro, i capperi ed i filetti di acciughe cuocendo infine la pizza in forno. Una variante prevede anche l'aggiunta di olive (non snocciolate) come ulteriore condimento."
         ]);

         Pizza::factory()->create([
            'name' => 'Pizza Crudaiola',
            'description' => "La crudaiola è una pizza diversa da tutte le altre; la base una volta cotta da sola con la mozzarella, viene arricchita da un mix di verdurine crude, proprio per mantenerne tutta la freschezza e croccantezza e gustare al meglio tutti i sapori."
         ]);

         Pizza::factory()->create([
            'name' => 'Pizza Marinara',
            'description' => "La pizza marinara è una tipica pizza napoletana realizzata solo con pomodoro fresco, olio, aglio e origano posizionati su un sottile strato di impasto. Questa pizza è la più famosa insieme alla margherita."
         ]);

         Pizza::factory()->create([
            'name' => 'Pizza Bufala',
            'description' => "Descrivere questa delizia è difficile a parole: la superficie liscia e lucida, color porcellana, il gusto intenso e particolare, e la consistenza inconfondibile l'hanno fatta apprezzare in tutto il mondo."
         ]);

         Pizza::factory()->create([
            'name' => 'Pizza Romana',
            'description' => "La pizza romana è una delle tante varianti della pizza. Questa è una delle preparazioni partenopee più semplici e gustose, che richiede pochissimi ingredienti: mozzarella, pomodoro, origano, acciughe e olio extravergine di oliva adagiati su uno strato sottile di pasta per la pizza."
         ]);

         Pizza::factory()->create([
            'name' => 'Pizza Hawaiana',
            'description' => "La pizza hawaiana è apprezzata da americani, australiani, dalla società canadese e altri popoli esteri, ma viene vista con occhio critico dai puristi della pizza italiana. Questa pizza prevede l'audace combinazione di gusti dolce + salato, apprezzata dai più temerari."
         ]);
    }
}
