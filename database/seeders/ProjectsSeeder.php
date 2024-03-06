<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\Projects;
use App\Repositories\Skills;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;

class ProjectsSeeder extends Seeder
{
    /**
     * Skills repository instance.
     *
     * @param Skills $skills
     */
    protected Skills $skills;

    /**
     * Projects repository instance.
     *
     * @param Projects $projects
     */
    protected Projects $projects;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Skills $skills, Projects $projects)
    {
        $this->skills = $skills;

        $this->projects = $projects;
    }

    /**
     * Seed the application's database.
     *
     * @param User $user
     * @return void
     */
    public function run(User $user): void
    {
        $project = $this->projects->create([
            'name' => [
                'en' => 'Ielectro',
                'es' => 'Ielectro',
            ],
            'description' => [
                'en' => 'Developing web application using PHP/Laravel, integrating APIs like Amazon or Miravia. Additionally, I oversaw ongoing website maintenance.',
                'es' => 'Desarrollando aplicación con PHP/Laravel, integrando APIs como Amazon y Miravia. Además, gestioné el mantenimiento continuo del sitio web.',
            ],
            'url' => 'https://www.ielectro.es/',
            'image' => new File('resources/assets/images/projects/ielectro.png'),
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => null
        ], $user);

        $project->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Postgres')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Docker')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'MAYOR2010',
                'es' => 'MAYOR2010',
            ],
            'description' => [
                'en' => 'Web development and maintenance with PHP/Laravel.',
                'es' => 'Desarrollando y manteniendo web con PHP/Laravel.',
            ],
            'url' => 'https://www.mayor2010.com/',
            'image' => new File('resources/assets/images/projects/mayor2010.png'),
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => null
        ], $user);

        $project->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Postgres')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Docker')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'Tourism Àger',
                'es' => 'Turismo Àger',
            ],
            'description' => [
                'en' => 'New website made in HTML and CSS with WordPress.',
                'es' => 'Nueva página web echa en HTML y CSS junto a WordPress.',
            ],
            'url' => 'https://turismeager.cat/',
            'image' => new File('resources/assets/images/projects/turismeager.png'),
            'start_date' => Carbon::parse('21-06-2022'),
            'finish_date' => Carbon::parse('15-07-2022')
        ], $user);

        $project->skills()->attach($this->skills->newQuery()->name('Wordpress')->first());
        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'Runedia',
                'es' => 'Runedia',
            ],
            'description' => [
                'en' => 'Modifications and new page functions in PHP and JS.',
                'es' => 'Modificaciones y nuevas funciones de la página en PHP y JS.',
            ],
            'url' => 'https://runedia.mundodeportivo.com/',
            'image' => new File('resources/assets/images/projects/runedia.png'),
            'start_date' => Carbon::parse('01-01-2022'),
            'finish_date' => Carbon::parse('01-01-2023')
        ], $user);

        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Mysql')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'Ferreteria.es',
                'es' => 'Ferreteria.es',
            ],
            'description' => [
                'en' => 'Assistant for the development of an application for stock and order management for both the website and Amazon.',
                'es' => 'Ayudante de desarrollo de una aplicación para la gestión de stock y pedidos tanto de la página web como de Amazon.',
            ],
            'url' => 'https://ferreteria.es/',
            'image' => new File('resources/assets/images/projects/ferreteriaes.png'),
            'start_date' => Carbon::parse('01-06-2022'),
            'finish_date' => Carbon::parse('01-09-2022')
        ], $user);

        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Mysql')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());
    }
}
