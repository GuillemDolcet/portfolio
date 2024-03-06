<?php

namespace Database\Seeders;

use App\Repositories\Education;
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
     * Education repository instance.
     *
     * @param Education $education
     */
    protected Education $education;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Skills $skills, Education $education)
    {
        $this->skills = $skills;

        $this->education = $education;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $education = $this->education->create([
            'school' => [
                'en' => 'Institut Almatà',
                'es' => 'Institut Almatà',
            ],
            'degree' => [
                'en' => 'Vocational Education and Training',
                'es' => 'Formación Profesional de Grado Medio',
            ],
            'discipline' => [
                'en' => 'Microcomputer Systems and Network Technician',
                'es' => 'Técnico en Sistemas Microinformáticos y Redes',
            ],
            'description' => [
                'en' => 'Graduated as a Technician in Microcomputer Systems and Networks with strong skills in maintenance, configuration, and problem-solving in computer environments.',
                'es' => 'Graduado en Técnico en Sistemas Microinformáticos y Redes con habilidades sólidas en mantenimiento, configuración y resolución de problemas en entornos informáticos.',
            ],
            'start_date' => Carbon::parse('01-09-2017'),
            'finish_date' => Carbon::parse('01-07-2019')
        ]);

        $education->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Wordpress')->first());

        $education = $this->education->create([
            'school' => [
                'en' => 'Institut Almatà',
                'es' => 'Institut Almatà',
            ],
            'degree' => [
                'en' => 'Certificate of Higher Education',
                'es' => 'Formación Profesional de Grado Superior',
            ],
            'discipline' => [
                'en' => 'Web Application Development',
                'es' => 'Desarrollo de Aplicaciones Web',
            ],
            'description' => [
                'en' => 'Graduated with a Higher Degree in Web Application Development, equipped with advanced skills in designing, building, and troubleshooting web applications.',
                'es' => 'Graduado con un Grado Superior en Desarrollo de Aplicaciones Web, con habilidades avanzadas en el diseño, construcción y resolución de problemas en aplicaciones web.'
            ],
            'start_date' => Carbon::parse('01-09-2019'),
            'finish_date' => Carbon::parse('01-07-2021')
        ]);

        $education->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Docker')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Mysql')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Css')->first());
    }
}
