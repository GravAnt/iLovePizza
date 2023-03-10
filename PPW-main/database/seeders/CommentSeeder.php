<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Comment;

/**
 * Scritto da: Marco Pernisco
 */
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()->create([
            'user_id' => '1',
            'recipe_id' => '1',
            'description' => 'Test',
         ]);

         Comment::factory()->create([
            'user_id' => '1',
            'recipe_id' => '4',
            'description' => 'Questo è un commento di prova',
         ]);

         Comment::factory()->create([
            'user_id' => '1',
            'recipe_id' => '5',
            'description' => 'Questo è un commento di prova',
         ]);
    }
}
