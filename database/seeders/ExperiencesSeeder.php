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
                'en' => 'Fullstack Software Engineer',
                'es' => 'Fullstack Software Engineer',
                'ca' => 'Fullstack Software Engineer',
            ],
            'company' => [
                'en' => 'TÜV Rheinland',
                'es' => 'TÜV Rheinland',
                'ca' => 'TÜV Rheinland',
            ],
            'location' => [
                'en' => 'El Prat de Llobregat, Barcelona, Spain',
                'es' => 'El Prat de Llobregat, Barcelona, España',
                'ca' => 'El Prat de Llobregat, Barcelona, Espanya',
            ],
            'description' => [
                'en' => 'Development of diverse applications from scratch using PHP and Laravel, while simultaneously maintaining legacy systems based on Java and JavaScript. The primary focus has been on improving performance, optimizing code, and streamlining processes to efficiently meet client needs. Active work is performed to enhance system scalability, reduce latency, and ensure a robust and reliable architecture to support business growth.',
                'es' => 'Desarrollo de diversas aplicaciones desde cero utilizando PHP y Laravel, con mantenimiento simultáneo de sistemas heredados basados en Java y JavaScript. El enfoque principal ha sido la mejora del rendimiento, la optimización del código y la simplificación de procesos para satisfacer eficientemente las necesidades del cliente. Se trabaja activamente en potenciar la escalabilidad de los sistemas, reducir la latencia y asegurar una arquitectura robusta y confiable que dé soporte al crecimiento del negocio.',
                'ca' => "Desenvolupament de diverses aplicacions des de zero utilitzant PHP i Laravel, amb manteniment simultani de sistemes heretats basats en Java i JavaScript. L'enfocament principal ha estat la millora del rendiment, l'optimització del codi i la simplificació de processos per a satisfer de manera eficient les necessitats del client. Es treballa activament per potenciar l'escalabilitat dels sistemes, reduir la latència i assegurar una arquitectura robusta i fiable que doni suport al creixement del negoci.",
            ],
            'start_date' => Carbon::parse('08-05-2024'),
            'finish_date' => null
        ]);

        $experience->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Docker')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Postgresql')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('SQL Server')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Git')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Tailwind')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('CI/CD')->first());

        $experience = $this->experiences->create([
            'position' => [
                'en' => 'Fullstack Software Engineer',
                'es' => 'Fullstack Software Engineer',
                'ca' => 'Fullstack Software Engineer',
            ],
            'company' => [
                'en' => 'INSON S.A.',
                'es' => 'INSON S.A.',
                'ca' => 'INSON S.A.',
            ],
            'location' => [
                'en' => 'Alcoletge, Lleida, Spain',
                'es' => 'Alcoletge, Lleida, España',
                'ca' => 'Alcoletge, Lleida, Espanya',
            ],
            'description' => [
                'en' => 'Development and maintenance of multiple e-commerce applications using PHP and Laravel, with a focus on building scalable and secure platforms. Creation and integration of APIs to enhance system functionality, improve performance, and streamline data flow between services. Continuous optimization of the user experience and backend performance, ensuring high availability and seamless operation for end users.',
                'es' => 'Desarrollo y mantenimiento de múltiples aplicaciones de comercio electrónico utilizando PHP y Laravel, con un enfoque en la creación de plataformas escalables y seguras. Creación e integración de APIs para mejorar la funcionalidad del sistema, optimizar el rendimiento y agilizar el flujo de datos entre servicios. Optimización continua de la experiencia del usuario y del rendimiento del backend, asegurando alta disponibilidad y una operación fluida para los usuarios finales.',
                'ca' => "Desenvolupament i manteniment de múltiples aplicacions de comerç electrònic utilitzant PHP i Laravel, amb un enfocament en la creació de plataformes escalables i segures. Creació i integració d'APIs per millorar la funcionalitat del sistema, optimitzar el rendiment i agilitzar el flux de dades entre serveis. Optimització contínua de l'experiència d'usuari i del rendiment del backend, assegurant alta disponibilitat i una operació fluida per als usuaris finals.",
            ],
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => Carbon::parse('07-05-2024')
        ]);

        $experience->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Docker')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Postgresql')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Git')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Tailwind')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('CI/CD')->first());

        $experience = $this->experiences->create([
            'position' => [
                'en' => 'Fullstack Software Engineer',
                'es' => 'Fullstack Software Engineer',
                'ca' => 'Fullstack Software Engineer',
            ],
            'company' => [
                'en' => 'CompsaOnline S.L.',
                'es' => 'CompsaOnline S.L.',
                'ca' => 'CompsaOnline S.L.',
            ],
            'location' => [
                'en' => 'Balaguer, Lleida, Spain',
                'es' => 'Balaguer, Lleida, España',
                'ca' => 'Balaguer, Lleida, Espanya',
            ],
            'description' => [
                'en' => 'Development and leadership of numerous projects using PHP and Laravel, specializing in the creation of robust management software and scalable e-commerce platforms. The work consistently addresses diverse client needs by delivering high-performance, secure, and user-friendly solutions.',
                'es' => 'Desarrollo y liderazgo de numerosos proyectos utilizando PHP y Laravel, con especialización en la creación de software de gestión robusto y plataformas de comercio electrónico escalables. El trabajo aborda consistentemente las diversas necesidades del cliente, entregando soluciones de alto rendimiento, seguras y fáciles de usar.',
                'ca' => "Desenvolupament i lideratge de nombrosos projectes utilitzant PHP i Laravel, amb especialització en la creació de programari de gestió robust i plataformes de comerç electrònic escalables. La feina aborda consistentment les diverses necessitats del client, lliurant solucions d'alt rendiment, segures i fàcils d'utilitzar.",
            ],
            'start_date' => Carbon::parse('01-06-2020'),
            'finish_date' => Carbon::parse('21-02-2023')
        ]);

        $experience->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Mysql')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Postgresql')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('SQL Server')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Git')->first());
        $experience->skills()->attach($this->skills->newQuery()->name('Tailwind')->first());
    }
}
