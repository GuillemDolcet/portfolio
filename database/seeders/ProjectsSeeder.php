<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\Skills;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
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
        $project = $user->projects()->create([
            'name' => [
                'en' => 'Ielectro',
                'es' => 'Ielectro',
            ],
            'description' => [
                'en' => 'Developing web application using PHP/Laravel, integrating APIs like: Amazon, Miravia, and Sequra. Additionally, I oversaw ongoing website maintenance.',
                'es' => 'Desarrollando aplicacion con PHP/Laravel, integrando APIs como por ejemplo: Amazon, Miravia y Sequra. Además, gestioné el mantenimiento continuo del sitio web.',
            ],
            'url' => 'https://www.ielectro.es/',
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => null
        ]);

        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Mysql')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Postgres')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());

        $project = $user->projects()->create([
            'name' => [
                'en' => 'MAYOR2010',
                'es' => 'MAYOR2010',
            ],
            'description' => [
                'en' => 'Web application development and web maintenance with PHP/Laravel.',
                'es' => 'Desarrollando aplicacion y manteniendo web con PHP/Laravel.',
            ],
            'url' => 'https://www.mayor2010.com/',
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => null
        ]);

        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Mysql')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Postgres')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());

        $project = $user->projects()->create([
            'name' => [
                'en' => 'Tourism ager',
                'es' => 'Turismo ager',
            ],
            'description' => [
                'en' => 'Web application development and web maintenance with PHP/Laravel.',
                'es' => 'Desarrollando aplicacion y manteniendo web con PHP/Laravel.',
            ],
            'url' => 'https://turismeager.cat/',
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => null
        ]);

        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Mysql')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Postgres')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());

        $project = $user->projects()->create([
            'name' => [
                'en' => 'Runedia',
                'es' => 'Runedia',
            ],
            'description' => [
                'en' => 'Web application development and web maintenance with PHP/Laravel.',
                'es' => 'Desarrollando aplicacion y manteniendo web con PHP/Laravel.',
            ],
            'url' => 'https://runedia.mundodeportivo.com/',
            'start_date' => Carbon::parse('21-02-2023'),
            'finish_date' => null
        ]);

        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Laravel')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('JS')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Mysql')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Postgres')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Html')->first());
        $project->skills()->attach($this->skills->newQuery()->user($user)->name('Css')->first());
    }
}
