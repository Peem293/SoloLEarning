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
        User::create([
            'employee' => 'Administrator',
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'password' => 'administrator',
            'role' => 'Administrator',
            'email_verified_at' => now(),
        ]);
        User::create([
            'employee' => 'Admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
            'role' => 'Admin',
            'email_verified_at' => now(),
        ]);
        User::create([
            'employee' => 'User',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'user1234',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
