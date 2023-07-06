<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Zeeland Refinary',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'Zeeland Refinary',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
    }
}
