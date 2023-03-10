<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Photo;

/**
 * Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa
 */
class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Photo::factory()->create([
            'name' => 'default.jpg',
            'size' => '4128',
            'coverable_id' => '0',
            'coverable_type' => 'App\Models\User',
         ]);

         Photo::factory()->create([
            'name' => 'associazioneDefault.jpg',
            'size' => '11447',
            'coverable_id' => '1',
            'coverable_type' => 'App\Models\Association',
         ]);

         Photo::factory()->create([
            'name' => 'recipePic_1.jpg',
            'size' => '1001416',
            'coverable_id' => '1',
            'coverable_type' => 'App\Models\Recipe',
         ]);

         Photo::factory()->create([
            'name' => 'recipePic_2.jpg',
            'size' => '1200067',
            'coverable_id' => '4',
            'coverable_type' => 'App\Models\Recipe',
         ]);

         Photo::factory()->create([
            'name' => 'recipePic_3.jpg',
            'size' => '328954',
            'coverable_id' => '3',
            'coverable_type' => 'App\Models\Recipe',
         ]);

         Photo::factory()->create([
            'name' => 'recipePic_4.jpg',
            'size' => '193000',
            'coverable_id' => '2',
            'coverable_type' => 'App\Models\Recipe',
         ]);

         Photo::factory()->create([
            'name' => 'recipePic_5.jpg',
            'size' => '193000',
            'coverable_id' => '5',
            'coverable_type' => 'App\Models\Recipe',
         ]);

         Photo::factory()->create([
            'name' => 'associazioneDefault.jpg',
            'size' => '45284',
            'coverable_id' => '0',
            'coverable_type' => 'App\Models\Association',
         ]);

         Photo::factory()->create([
            'name' => 'pizzaMargherita.jpg',
            'size' => '92756',
            'coverable_id' => '1',
            'coverable_type' => 'App\Models\Pizza',
         ]);

         Photo::factory()->create([
            'name' => 'pizzaDiavola.jpg',
            'size' => '117555',
            'coverable_id' => '2',
            'coverable_type' => 'App\Models\Pizza',
         ]);

         Photo::factory()->create([
            'name' => 'pizzaNapoli.jpg',
            'size' => '319808',
            'coverable_id' => '3',
            'coverable_type' => 'App\Models\Pizza',
         ]);

         Photo::factory()->create([
            'name' => 'pizzaCrudaiola.jpg',
            'size' => '573151',
            'coverable_id' => '4',
            'coverable_type' => 'App\Models\Pizza',
         ]);

         Photo::factory()->create([
            'name' => 'pizzaMarinara.jpg',
            'size' => '108714',
            'coverable_id' => '5',
            'coverable_type' => 'App\Models\Pizza',
         ]);

         Photo::factory()->create([
            'name' => 'pizzaBufala.jpg',
            'size' => '54779',
            'coverable_id' => '6',
            'coverable_type' => 'App\Models\Pizza',
         ]);
         Photo::factory()->create([
            'name' => 'pizzaRomana.jpg',
            'size' => '63851',
            'coverable_id' => '7',
            'coverable_type' => 'App\Models\Pizza',
         ]);

         Photo::factory()->create([
            'name' => 'pizzaHawaiana.jpg',
            'size' => '53030',
            'coverable_id' => '8',
            'coverable_type' => 'App\Models\Pizza',
         ]);
    }
}
