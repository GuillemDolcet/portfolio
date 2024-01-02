<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'start_date' => Carbon::parse('21/02/2023'),
            'finish_date' => null
        ]);

        $experience = $user->experiences()->create([
            'position' => [
                'en' => 'Junior Fullstack Developer',
                'es' => 'Junior Fullstack Developer',
            ],
            'company' => [
                'en' => 'CompsaOnline S.L.',
                'es' => 'CompsaOnline S.L.',
            ],
            'location' => [
                'en' => 'Balaguer, Lleida, Spain',
                'es' => 'Balaguer, Lleida, España',
            ],
            'description' => [
                'en' => '',
                'es' => '',
            ],
            'start_date' => Carbon::parse('01/06/2020'),
            'finish_date' => Carbon::parse('21/02/2023')
        ]);
    }
}
