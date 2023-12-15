<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ExperiencesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(User $user): void
    {
        $experience = $user->experiences()->create([
            'position' => [
                'en' => 'Middle Fullstack Developer',
                'es' => 'Middle Fullstack Developer',
            ],
            'company' => [
                'en' => 'INSON S.A.',
                'es' => 'INSON S.A.',
            ],
            'location' => [
                'en' => 'Alcoletge, Lleida, Spain',
                'es' => 'Alcoletge, Lleida, España',
            ],
            'description' => [
                'en' => '',
                'es' => '',
            ],
            'start_date' => '',
            'finish_date' => ''
        ]);
    }
}
