<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'guillem',
            'email' => 'g.dolcet.jove@gmail.com',
            'active' => true,
        ]);
        $user->assignRole('admin');

        $this->call(SkillsSeeder::class, false, ['user' => $user]);
        $this->call(ExperiencesSeeder::class, false, ['user' => $user]);
        $this->call(ProjectsSeeder::class, false, ['user' => $user]);
        $this->call(EducationSeeder::class, false, ['user' => $user]);
        $this->call(HobbiesSeeder::class, false, ['user' => $user]);
    }
}
