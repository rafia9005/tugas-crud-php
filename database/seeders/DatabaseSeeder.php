<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::create([
        "name" => "Ahmad Rafi",
        "email" => "rafia9005@gmail.com",
        "password" => "admin123"
       ]);

       User::factory(20)->create();
    }
}
