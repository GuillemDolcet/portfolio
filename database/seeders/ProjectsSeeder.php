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
     * @return void
     */
    public function run(): void
    {
        $project = $this->projects->create([
            'name' => [
                'en' => 'Ielectro',
                'es' => 'Ielectro',
                'ca' => 'Ielectro',
            ],
            'description' => [
                'en' => 'Implementation of marketplaces through APIs, web maintenance and new functionalities in PHP/Laravel.',
                'es' => 'Implementación de marketplaces a través de APIs, mantenimiento web y nuevas funcionalidades en PHP/Laravel.',
                'ca' => 'Implementació de marketplaces a través d\'APIs, manteniment web i noves funcionalitats en PHP/Laravel.',
            ],
            'url' => 'https://www.ielectro.es/',
            'image' => new File('resources/assets/images/projects/ielectro.png'),
            'order' => 1
        ]);

        $project->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('SQL')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Docker')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'MAYOR2010',
                'es' => 'MAYOR2010',
                'ca' => 'MAYOR2010',
            ],
            'description' => [
                'en' => 'Maintenance and expansion of PHP/Laravel website, incorporating new functionalities to optimize the user experience.',
                'es' => 'Mantenimiento y expansión de sitio web en PHP/Laravel, incorporando nuevas funcionalidades para optimizar la experiencia del usuario.',
                'ca' => 'Manteniment i expansió de lloc web en PHP/Laravel, incorporant noves funcionalitats per optimitzar l\'experiència de l\'usuari.',
            ],
            'url' => 'https://www.mayor2010.com/',
            'image' => new File('resources/assets/images/projects/mayor2010.png'),
            'order' => 2
        ]);

        $project->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('APIs')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('SQL')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Docker')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'Ferreteria.es',
                'es' => 'Ferreteria.es',
                'ca' => 'Ferreteria.es',
            ],
            'description' => [
                'en' => 'Development of an application in PHP/Laravel for stock and order management for both the website and Amazon.',
                'es' => 'Desarrollo de una aplicación en PHP/Laravel para la gestión de stock y pedidos tanto de la página web como de Amazon.',
                'ca' => 'Desenvolupament d\'una aplicació en PHP/Laravel per a la gestió d\'estoc i comandes tant de la pàgina web com d\'Amazon.',
            ],
            'url' => 'https://ferreteria.es/',
            'image' => new File('resources/assets/images/projects/ferreteriaes.png'),
            'order' => 3
        ]);

        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('SQL')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());


        $project = $this->projects->create([
            'name' => [
                'en' => 'Tourism Àger',
                'es' => 'Turismo Àger',
                'ca' => 'Turisme Àger',
            ],
            'description' => [
                'en' => 'Tourism website creation with HTML, CSS and WordPress.',
                'es' => 'Creación de web de turismo con HTML, CSS y WordPress.',
                'ca' => 'Creació de web de turisme amb HTML, CSS i WordPress.',
            ],
            'url' => 'https://turismeager.cat/',
            'image' => new File('resources/assets/images/projects/turismeager.png'),
            'order' => 4
        ]);

        $project->skills()->attach($this->skills->newQuery()->name('Wordpress')->first());
        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'Runedia',
                'es' => 'Runedia',
                'ca' => 'Runedia',
            ],
            'description' => [
                'en' => 'Modification and new functionalities with PHP and JS.',
                'es' => 'Modificación y nuevas funcionalidades con PHP y JS.',
                'ca' => 'Modificació i noves funcionalitats amb PHP i JS.',
            ],
            'url' => 'https://runedia.mundodeportivo.com/',
            'image' => new File('resources/assets/images/projects/runedia.png'),
            'order' => 5
        ]);

        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('SQL')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());

        $project = $this->projects->create([
            'name' => [
                'en' => 'Gili Group',
                'es' => 'Gili Group',
                'ca' => 'Gili Group',
            ],
            'description' => [
                'en' => 'Site modifications and programming of new ERP.',
                'es' => 'Modificaciones de la página y programación de su nuevo ERP.',
                'ca' => 'Modificacions de la pàgina i programació del seu nou ERP.',
            ],
            'url' => 'https://giligroup.com/',
            'image' => new File('resources/assets/images/projects/giligroup.png'),
            'order' => 6
        ]);

        $project->skills()->attach($this->skills->newQuery()->name('PHP')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->name('SQL')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->name('Css')->first());
    }
}
