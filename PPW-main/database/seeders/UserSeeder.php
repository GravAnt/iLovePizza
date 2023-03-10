<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Scritto da: Antonio Gravina
 */

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'MarioRossi',
            'email' => 'amministratore@ilovepizza.it',
            'bio' => 'Profilo amministratore Mario Rossi',
            'role' => 'admin',
            'password' => Hash::make('amministratore'),
         ]);

         User::factory()->create([
            'name' => 'LuigiBianchi',
            'email' => 'luigibianchi@example.com',
            'bio' => 'Ciao, sono Luigi Bianchi!',
            'role' => 'base',
            'password' => Hash::make('password'),
         ]);

    //Creazione randomica di User
        User::factory()->times(count: 20)->create();
    }
}
