<?php

namespace Database\Seeders;

use App\Models\Transaction;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'uuid' => Str::uuid(),
            'email' => 'test@example.com',
        ]);

       

        // Create additional users using factory
        User::factory(10)->create();
       
        
    }
}
