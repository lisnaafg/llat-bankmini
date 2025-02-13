<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nik' => '1234567890',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
            'hp' => '085795146348',
            'peran' => 'admin'
        ]);
    }
}
