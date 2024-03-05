<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'name' => 'Guillem Dolcet Jové',
            'email' => 'g.dolcet.jove@gmail.com',
            'date_of_birth' => Carbon::parse('18-09-2001'),
            'phone' => '+34 634 490 171',
            'location' => [
                'en' => 'Os de Balaguer, Cataluña, Spain',
                'es' => 'Os de Balaguer, Cataluña, España',
            ],
            'linkedin' => 'guillem-dolcet',
            'github' => 'GuillemDolcet',
            'active' => true
        ]);
        $user->languages()->create([
            'name' => [
                'en' => 'English',
                'es' => 'Ingles',
            ],
            'level' => 60
        ]);
        $user->languages()->create([
            'name' => [
                'en' => 'Spanish',
                'es' => 'Español',
            ],
            'level' => 100
        ]);
        $user->languages()->create([
            'name' => [
                'en' => 'Catalan',
                'es' => 'Catalan',
            ],
            'level' => 100
        ]);
        $user->assignRole('admin');

        $this->call(SkillsSeeder::class, false, ['user' => $user]);
        $this->call(ExperiencesSeeder::class, false, ['user' => $user]);
        $this->call(ProjectsSeeder::class, false, ['user' => $user]);
        $this->call(EducationSeeder::class, false, ['user' => $user]);
        $this->call(HobbiesSeeder::class, false, ['user' => $user]);
    }
}
