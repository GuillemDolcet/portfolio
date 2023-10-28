<?php

namespace Database\Seeders;

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
        $user = User::factory()->create([
            'name' => 'demo',
            'email' => 'demo@demo.com',
            'password' => Hash::make('1234'),
        ]);
        $user->assignRole('user');
    }
}
