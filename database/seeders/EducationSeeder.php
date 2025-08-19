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
                'ca' => 'Institut Almatà',
            ],
            'degree' => [
                'en' => 'Vocational Education and Training',
                'es' => 'Formación Profesional de Grado Medio',
                'ca' => 'Formació Professional de Grau Mitjà',
            ],
            'discipline' => [
                'en' => 'Microcomputer Systems and Network Technician',
                'es' => 'Técnico en Sistemas Microinformáticos y Redes',
                'ca' => 'Tècnic en Sistemes Microinformàtics i Xarxes',
            ],
            'description' => [
                'en' => 'Hands-on training in computer hardware, operating systems, and basic network administration. Expertise in configuring and maintaining Linux systems via command line, setting up Apache web servers, and managing local networks. Foundational knowledge in HTML and CSS for basic frontend technologies.',
                'es' => 'Formación práctica en hardware, sistemas operativos y administración básica de redes. Experiencia en configuración y mantenimiento de sistemas Linux por línea de comandos, instalación de servidores web Apache, y gestión de redes locales. Conocimientos básicos de HTML y CSS para tecnologías frontend.',
                'ca' => "Formació pràctica en hardware, sistemes operatius i administració bàsica de xarxes. Experiència en configuració i manteniment de sistemes Linux per línia de comandes, instal·lació de servidors web Apache, i gestió de xarxes locals. Coneixements bàsics d'HTML i CSS per a tecnologies frontend.",
            ],
            'start_date' => Carbon::parse('01-09-2017'),
            'finish_date' => Carbon::parse('01-07-2019')
        ]);

        $education->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Css')->first());

        $education = $this->education->create([
            'school' => [
                'en' => 'Institut Almatà',
                'es' => 'Institut Almatà',
                'ca' => 'Institut Almatà',
            ],
            'degree' => [
                'en' => 'Certificate of Higher Education',
                'es' => 'Formación Profesional de Grado Superior',
                'ca' => 'Formació Professional de Grau Superior',
            ],
            'discipline' => [
                'en' => 'Web Application Development',
                'es' => 'Desarrollo de Aplicaciones Web',
                'ca' => 'Desenvolupament d\'Aplicacions Web',
            ],
            'description' => [
                'en' => 'Comprehensive training in web application development, with a strong foundation in programming and modern development tools. Covered core languages and technologies such as C, Java, JSP, HTML, CSS, JavaScript and version control with Git. Practical experience in Docker containers, and skills in both backend and frontend development practices.',
                'es' => 'Formación completa en desarrollo de aplicaciones web, con una sólida base en programación y herramientas de desarrollo modernas. Lenguajes y tecnologías clave: C, Java, JSP, HTML, CSS, JavaScript y control de versiones con Git. Experiencia práctica en contenedores Docker, y habilidades en desarrollo backend y frontend.',
                'ca' => "Formació completa en desenvolupament d'aplicacions web, amb una sòlida base en programació i eines de desenvolupament modernes. Llenguatges i tecnologies clau: C, Java, JSP, HTML, CSS, JavaScript i control de versions amb Git. Experiència pràctica en contenidors Docker, i habilitats en desenvolupament backend i frontend.",
            ],
            'start_date' => Carbon::parse('01-09-2019'),
            'finish_date' => Carbon::parse('01-07-2021')
        ]);

        $education->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Docker')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Mysql')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Css')->first());

        $education = $this->education->create([
            'school' => [
                'en' => 'Unipro',
                'es' => 'Unipro',
                'ca' => 'Unipro',
            ],
            'degree' => [
                'en' => 'Bachelor in Computer Science',
                'es' => 'Bachelor en Informática',
                'ca' => 'Grau en Informàtica',
            ],
            'discipline' => [
                'en' => 'Computer Science',
                'es' => 'Informática',
                'ca' => 'Informàtica',
            ],
            'description' => [
                'es' => 'Formación integral en programación, sistemas, redes, ciberseguridad e inteligencia artificial.',
                'en' => 'Comprehensive training in programming, systems, networks, cybersecurity, and artificial intelligence.',
                'ca' => 'Formació integral en programació, sistemes, xarxes, ciberseguretat i intel·ligència artificial.',
            ],
            'start_date' => Carbon::parse('20-09-2025'),
            'finish_date' => null
        ]);

        $education->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Docker')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Mysql')->first());
        $education->skills()->attach($this->skills->newQuery()->name('Css')->first());
    }
}
