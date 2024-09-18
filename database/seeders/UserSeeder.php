<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'role' => 0
        ]);
        \App\Models\User::factory(5)->create([
            'role' => 1
        ]); // create 5 teacher
        \App\Models\User::factory(10)->create([
            'role' => 2
        ]); // create 10 user
    }
}
