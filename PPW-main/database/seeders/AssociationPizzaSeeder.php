<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\AssociationPizza;

/**
 * Scritto da: Antonio Gravina
 */
class AssociationPizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         AssociationPizza::factory()->create([
            'association_id' => '1',
            'pizza_id' => '1',
         ]);

         AssociationPizza::factory()->create([
            'association_id' => '1',
            'pizza_id' => '2',
         ]);

         AssociationPizza::factory()->create([
            'association_id' => '3',
            'pizza_id' => '1',
         ]);

         AssociationPizza::factory()->create([
            'association_id' => '2',
            'pizza_id' => '1',
         ]);

         AssociationPizza::factory()->create([
            'association_id' => '1',
            'pizza_id' => '7',
         ]);

    }
}