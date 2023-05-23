<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create( [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make( '12345678' ),
            'roles' => json_encode( ['ADMIN'] ),
        ] );

    }
}