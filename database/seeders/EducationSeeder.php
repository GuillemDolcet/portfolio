<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\Skills;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Skills repository instance.
     *
     * @param Skills $skills
     */
    protected Skills $skills;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Skills $skills)
    {
        $this->skills = $skills;
    }

    /**
     * Seed the application's database.
     *
     * @param User $user
     * @return void
     */
    public function run(User $user): void
    {
        $education = $user->education()->create([
            'school' => [
                'en' => 'Institut Almatà',
                'es' => 'Institut Almatà',
            ],
            'degree' => [
                'en' => 'INSON S.A.',
                'es' => 'Formación Profesional de Grado Medio',
            ],
            'discipline' => [
                'en' => 'Microcomputer Systems and Network Technician',
                'es' => 'Técnico en Sistemas Microinformáticos y Redes',
            ],
            'description' => [
                'en' => 'Desarrollo en PHP y Laravel, destacando en el diseño e implementación de soluciones eficientes. Especializado en la integración fluida de APIs para optimizar procesos.',
                'es' => 'Developer in PHP and Laravel, excelling in the design and implementation of efficient solutions. Specialized in seamless API integration to streamline processes.',
            ],
            'start_date' => Carbon::parse('01-09-2017'),
            'finish_date' => Carbon::parse('01-07-2019')
        ]);

        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Laravel')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('JS')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Mysql')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Postgres')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());

        $education = $user->experiences()->create([
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
                'en' => 'Desarrollo en PHP y Laravel, destacando en el diseño e implementación de soluciones eficientes. Especializado en la integración fluida de APIs para optimizar procesos.',
                'es' => 'Developer in PHP and Laravel, excelling in the design and implementation of efficient solutions. Specialized in seamless API integration to streamline processes.',
            ],
            'start_date' => Carbon::parse('01-06-2020'),
            'finish_date' => Carbon::parse('21-02-2023')
        ]);

        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Laravel')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('JS')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Mysql')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Postgres')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());
    }
}
