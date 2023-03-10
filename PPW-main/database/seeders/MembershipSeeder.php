<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Membership;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Scritto da: Antonio Gravina
 */
class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         Membership::factory()->create([
            'user_id' => '1',
            'association_id' => '1',
            'token' => Hash::make(Str::random(16)),
            'verified' => '1',
            'moderator' => '1',
         ]);

         Membership::factory()->create([
            'user_id' => '2',
            'association_id' => '1',
            'token' => Hash::make(Str::random(16)),
            'verified' => '1',
            'moderator' => '0',
         ]);

         Membership::factory()->create([
            'user_id' => '3',
            'association_id' => '2',
            'token' => Hash::make(Str::random(16)),
            'verified' => '1',
            'moderator' => '1',
         ]);

         Membership::factory()->create([
            'user_id' => '4',
            'association_id' => '3',
            'token' => Hash::make(Str::random(16)),
            'verified' => '1',
            'moderator' => '1',
         ]);
    }
}
