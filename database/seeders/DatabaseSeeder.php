<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => '12345678',
            'phone' => '0600000000',
            'address' => "sale sect el walfa"
        ]);

        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '12345678'
        ]);
    }
}
