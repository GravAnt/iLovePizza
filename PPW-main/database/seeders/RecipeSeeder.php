<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Recipe;

/**
 * Scritto da: Marco Pernisco
 */
class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Pizze Margherite
        Recipe::factory()->create([
            'association_id' => '1',
            'user_id' => '1',
            'name' => 'Pizza Margherita',
            'type' => 'Pizza Margherita',
            'ingredients' => 'Farina Manitoba 200gr, Farina 00 300gr, Acqua a temperatura ambiente 300ml, Lievito di birra fresco 4gr, Sale fino 10gr, Passata di pomodoro 300gr, Mozzarella 200gr, Olio qb, Basilico qb',
            'description' => 'Per preparare la pasta per la pizza abbiamo scelto di impastare il tutto a mano, ma se preferite utilizzare l’impastatrice potrete seguire gli stessi procedimenti, utilizzando il gancio a velocità medio bassa.Preriscalda il forno a 220 gradi (o segui le istruzioni dell impasto per pizza che hai acquistato/preparato)
            Stendi l impasto per pizza in una teglia o su una pietra per pizza, creando uno spessore di circa mezzo centimetro.
            Versa la passata di pomodoro sulla pizza, lasciando un bordo per la crosticina.
            Taglia la mozzarella a fette o a cubetti e distribuiscila sulla pizza.
            Condisci con un filo di olio di oliva e un pizzico di sale.
            Se vuoi, aggiungi un pò di origano per un sapore più intenso.
            Inforna la pizza per 8-10 minuti, o fino a quando la crosticina sarà dorata e la mozzarella fusa.
            Togli dal forno e servi caldo.',
         ]);

         Recipe::factory()->create([
            'association_id' => '2',
            'user_id' => '2',
            'name' => 'Pizza Margherita di Gino',
            'type' => 'Pizza Margherita',
            'ingredients' => 'Farina Manitoba 250gr, Farina 00 400gr, Acqua a temperatura ambiente 500ml, Lievito di birra 10gr, Sale fino 10gr, Passata di pomodoro Mutti 300gr, Mozzarella 200gr, Olio extravergine di oliva qb, Basilico qb',
            'description' => 'Per preparare la pasta per la pizza abbiamo scelto di impastare il tutto a mano, ma se preferite utilizzare l’impastatrice potrete seguire gli stessi procedimenti, utilizzando il gancio a velocità medio bassa.Preriscalda il forno a 220 gradi (o segui le istruzioni dell impasto per pizza che hai acquistato/preparato)
            Stendi l impasto per pizza in una teglia o su una pietra per pizza, creando uno spessore di circa mezzo centimetro.
            Versa la passata di pomodoro sulla pizza, lasciando un bordo per la crosticina.
            Taglia la mozzarella a fette o a cubetti e distribuiscila sulla pizza.
            Condisci con un filo di olio di oliva e un pizzico di sale.
            Se vuoi, aggiungi un pò di origano per un sapore più intenso.
            Inforna la pizza per 8-10 minuti, o fino a quando la crosticina sarà dorata e la mozzarella fusa.
            Togli dal forno e servi caldo.',
         ]);

         Recipe::factory()->create([
            'association_id' => '3',
            'user_id' => '3',
            'name' => 'Pizza Margherita alla Piero',
            'type' => 'Pizza Margherita',
            'ingredients' => 'Farina Manitoba 250gr, Farina 00 400gr, Acqua a temperatura ambiente 500ml, Lievito di birra 10gr, Sale fino 10gr, Passata di pomodoro Mutti 300gr, Mozzarella 200gr, Olio extravergine di oliva qb, Basilico qb',
            'description' => 'Per preparare la pasta per la pizza abbiamo scelto di impastare il tutto a mano, ma se preferite utilizzare l’impastatrice potrete seguire gli stessi procedimenti, utilizzando il gancio a velocità medio bassa.Preriscalda il forno a 220 gradi (o segui le istruzioni dell impasto per pizza che hai acquistato/preparato)
            Stendi l impasto per pizza in una teglia o su una pietra per pizza, creando uno spessore di circa mezzo centimetro.
            Versa la passata di pomodoro sulla pizza, lasciando un bordo per la crosticina.
            Taglia la mozzarella a fette o a cubetti e distribuiscila sulla pizza.
            Condisci con un filo di olio di oliva e un pizzico di sale.
            Se vuoi, aggiungi un pò di origano per un sapore più intenso.
            Inforna la pizza per 8-10 minuti, o fino a quando la crosticina sarà dorata e la mozzarella fusa.
            Togli dal forno e servi caldo.',
         ]);

// Pizza Romana
         Recipe::factory()->create([
            'association_id' => '1',
            'user_id' => '1',
            'name' => 'Pizza Romana',
            'type' => 'Pizza Romana',
            'ingredients' => 'Farina 0 1kg, Olio extravergine di oliva 60gr, Acqua 600gr, Lievito di birra fresco 7gr, Sale fino 20gr, Origano 10gr, Mozzarella Fiordilatte 600gr, Acciughe in vasetto 16pz',
            'description' => 'Per preparare la pizza romana iniziate dall impasto per la pizza. Versate la farina nella ciotola della planetaria. Aggiungete il lievito e 100 grammi d’acqua, quindi azionate la planetaria con il gancio montato a velocità medio-bassa.
            Procedete aggiungendo l’acqua poco per volta, avendo cura di aspettare che la dose precedente sia stata ben assorbita dalla farina. Una volta versati circa i 3/4 dell acqua aggiungete il sale e continuate ad impastare. Aggiungete il resto dell’acqua sempre a filo e lasciate lavorare la planetaria fino ad ottenere un composto liscio ed omogeneo.
            A questo punto aggiungete l’olio gradatamente (come avete fatto con l’acqua). Quando l’olio è stato completamente assorbito, estraete l’impasto dalla planetaria e modellatelo con le mani fino ad ottenere una palla. Inseritelo in una ciotola capiente leggermente unta.
            Coprite con pellicola o con un canovaccio pulito e mettete a lievitare nel forno spento con la luce accesa. Attendete che l’impasto abbia almeno raddoppiato il suo volume (1,5 h), meglio triplicato (2,5/3 h). Una volta che l’impasto avrà lievitato, trasferitelo sulla spianatoia e dividetelo in 4 parti uguali.
            Fate con ognuno delle palline. Copritele con un canovaccio pulito e lasciate riposare per 30 minuti. Ungete leggermente con un filo d’olio 4 teglie da pizza di 30 cm di diametro. Posizionate al centro della teglia una pallina di impasto e cominciate a schiacciare dal centro verso l’esterno, tirando i leggermente i lati se necessario.
            Se la pasta risulta troppo elastica e tende a tornare alla forma che aveva prima, mettete da parte la pizza che state stendendo e procedete a stenderne un’altra, facendo così riposare la precedente. Cercate di distendere la pasta su tutta la superficie della teglia. Versate un mestolo abbondante di salsa al pomodoro, precentemente condita con sale e origano, sulla base della teglia e spargetela con un movimento circolare,
            ricoprendo quasi tutta l’area, lasciando solo un bordo di circa 1,5 cm. Tritate grossolanamente la mozzarella. Condite ora la pizza con i filetti di alici, un filo d olio e la mozzarella tagliata a pezzetti. Lasciate riposare la pizza farcita per una decina di minuti, poi infornate a 250°C per 12/15 minuti in forno statico (altrimenti se utilizzate il forno ventilato basteranno una decina di minuti a 230°). 
            Non appena estraete la pizza romana dal forno, servitela immediatamente.',
         ]);
        
 // Pizza Diavola    
        Recipe::factory()->create([
            'association_id' => '1',
            'user_id' => '1',
            'name' => 'Pizza Diavola',
            'type' => 'Pizza Diavola',
            'ingredients' => 'Farina 0 1kg, Olio extravergine di oliva 60gr, Acqua 600gr, Lievito di birra fresco 7gr, Sale fino 20gr, Origano 10gr, Mozzarella Fiordilatte 600gr, Salame Piccante a piacere, Olive leccine',
            'description' => 'Per preparare la pizza diavola iniziate dall impasto per la pizza. Versate la farina nella ciotola della planetaria. Aggiungete il lievito e 100 grammi d’acqua, quindi azionate la planetaria con il gancio montato a velocità medio-bassa.
            Procedete aggiungendo l’acqua poco per volta, avendo cura di aspettare che la dose precedente sia stata ben assorbita dalla farina. Una volta versati circa i 3/4 dell acqua aggiungete il sale e continuate ad impastare. Aggiungete il resto dell’acqua sempre a filo e lasciate lavorare la planetaria fino ad ottenere un composto liscio ed omogeneo.
            A questo punto aggiungete l’olio gradatamente (come avete fatto con l’acqua). Quando l’olio è stato completamente assorbito, estraete l’impasto dalla planetaria e modellatelo con le mani fino ad ottenere una palla. Inseritelo in una ciotola capiente leggermente unta.
            Coprite con pellicola o con un canovaccio pulito e mettete a lievitare nel forno spento con la luce accesa. Attendete che l’impasto abbia almeno raddoppiato il suo volume (1,5 h), meglio triplicato (2,5/3 h). Una volta che l’impasto avrà lievitato, trasferitelo sulla spianatoia e dividetelo in 4 parti uguali.
            Fate con ognuno delle palline. Copritele con un canovaccio pulito e lasciate riposare per 30 minuti. Ungete leggermente con un filo d’olio 4 teglie da pizza di 30 cm di diametro. Posizionate al centro della teglia una pallina di impasto e cominciate a schiacciare dal centro verso l’esterno, tirando i leggermente i lati se necessario.
            Se la pasta risulta troppo elastica e tende a tornare alla forma che aveva prima, mettete da parte la pizza che state stendendo e procedete a stenderne un’altra, facendo così riposare la precedente. Cercate di distendere la pasta su tutta la superficie della teglia. Versate un mestolo abbondante di salsa al pomodoro, precentemente condita con sale e origano, sulla base della teglia e spargetela con un movimento circolare,
            ricoprendo quasi tutta l’area, lasciando solo un bordo di circa 1,5 cm. Tritate grossolanamente la mozzarella.',
         ]);    
    }
}
