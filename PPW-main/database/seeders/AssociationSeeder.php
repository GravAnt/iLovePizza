<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Association;
/**
 * Scritto da: Antonio Gravina
 */
class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Association::factory()->create([
            'name' => 'Napoli Cuore',
            'founder' => '1',
         ]);

        Association::factory()->create([
            'name' => 'Grande Roma',
            'founder' => '3',
         ]);
        
        Association::factory()->create([
            'name' => 'American Dream',
            'founder' => '4',
         ]);
    }
}
