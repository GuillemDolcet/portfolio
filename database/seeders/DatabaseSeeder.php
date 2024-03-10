<?php

namespace Database\Seeders;

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
        $this->call(UsersSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(ExperiencesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(SectionsSeeder::class);
        $this->call(PersonalInfoSeeder::class);
        $this->call(ServicesSeeder::class);
    }
}
