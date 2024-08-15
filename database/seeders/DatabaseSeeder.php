<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@samobilidade.com',
            'role' => 'admin',
            'password' => 'secret',
        ]);

        User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@samobilidade.com',
            'role' => 'editor',
            'password' => 'secret',
        ]);
    }
}
