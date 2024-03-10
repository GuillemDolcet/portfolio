<?php

namespace Database\Seeders;

use App\Repositories\Experiences;
use App\Repositories\Skills;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExperiencesSeeder extends Seeder
{
    /**
     * Skills repository instance.
     *
     * @param Skills $skills
     */
    protected Skills $skills;

    /**
     * Experiences repository instance.
     *
     * @param Experiences $experiences
     */
    protected Experiences $experiences;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Skills $skills, Experiences $experiences)
    {
        $this->skills = $skills;

        $this->experiences = $experiences;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $experience = $this->experiences->create([
            'position' => [
                'en' => 'Middle Backend Developer',
                'es' => 'Middle Backend Developer',
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
                'en' => 'Developer in PHP and Laravel, excelling in the design and implementation of efficient solutions. Specialized in seamless API integration to streamline processes.',
                'es' => 'Desarrollo en PHP y Laravel, destacando en el diseño e implementación de soluciones eficientes. Especializado en la integración fluida de APIs para optimizar procesos.',
            ],
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => null
        ]);

        $experience->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Docker')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('SQL')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Css')->first());

        $experience = $this->experiences->create([
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
                'en' => 'Developer in PHP and Laravel, excelling in the design and implementation of efficient solutions. Specialized in seamless API integration to streamline processes.',
                'es' => 'Desarrollo en PHP y Laravel, destacando en el diseño e implementación de soluciones eficientes. Especializado en la integración fluida de APIs para optimizar procesos.',
            ],
            'start_date' => Carbon::parse('01-06-2020'),
            'finish_date' => Carbon::parse('21-02-2023')
        ]);

        $experience->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('SQL')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Wordpress')->first());
    }
}
