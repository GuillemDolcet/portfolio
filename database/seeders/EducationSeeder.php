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
                'en' => 'Vocational Education and Training',
                'es' => 'Formación Profesional de Grado Medio',
            ],
            'discipline' => [
                'en' => 'Microcomputer Systems and Network Technician',
                'es' => 'Técnico en Sistemas Microinformáticos y Redes',
            ],
            'description' => [
                'en' => 'Graduated as a Technician in Microcomputer Systems and Networks with strong skills in maintenance, configuration, and problem-solving in computer environments. Prepared to face challenges in the technology world.',
                'es' => 'Graduado en Técnico en Sistemas Microinformáticos y Redes con habilidades sólidas en mantenimiento, configuración y resolución de problemas en entornos informáticos, preparado para afrontar desafíos en el mundo de la tecnología.',
            ],
            'start_date' => Carbon::parse('01-09-2017'),
            'finish_date' => Carbon::parse('01-07-2019')
        ]);

        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Linux')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Wordpress')->first());

        $education = $user->education()->create([
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
                'en' => 'Graduated with a Higher Degree in Web Application Development, equipped with advanced skills in designing, building, and troubleshooting web applications. Ready to excel in the dynamic field of web development.',
                'es' => 'Graduado con un Grado Superior en Desarrollo de Aplicaciones Web, con habilidades avanzadas en el diseño, construcción y resolución de problemas en aplicaciones web. Listo para destacar en el dinámico campo del desarrollo web.'
            ],
            'start_date' => Carbon::parse('01-09-2019'),
            'finish_date' => Carbon::parse('01-07-2021')
        ]);

        $education->skills()->attach($this->skills->newQuery()->user($user)->name('PHP')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Docker')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Mysql')->first());
        $education->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());
    }
}
