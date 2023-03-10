<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PizzaSeeder::class);
        $this->call(AssociationSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(MembershipSeeder::class);
        $this->call(AssociationPizzaSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
