<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() : void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');
        User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('user');
        User::factory(10)->create();
    }
}
