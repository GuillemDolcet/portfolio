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
            'name' => 'guillem',
            'email' => 'g.dolcet.jove@gmail.com',
            'active' => true,
            'password' => Hash::make('1234'),
        ]);
        $user->assignRole('admin');
        $this->call(SkillsSeeder::class, false, ['user' => $user]);
        //$this->call(ExperiencesSeeder::class, false, ['user' => $user]);
    }
}
