<?php

namespace Database\Seeders;

use App\Repositories\Skills;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;

class SkillsSeeder extends Seeder
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
     * @return void
     */
    public function run(): void
    {
        $this->skills->create([
            'name' => 'Laravel',
            'order' => 1,
            'level' => '95',
            'image' => new File('resources/assets/images/skills/laravel.svg')
        ]);

        $this->skills->create([
            'name' => 'PHP',
            'order' => 2,
            'level' => '95',
            'image' => new File('resources/assets/images/skills/php.svg')
        ]);

        $this->skills->create([
            'name' => 'APIs',
            'order' => 3,
            'level' => '90',
            'image' => new File('resources/assets/images/skills/apis.svg')
        ]);

        $this->skills->create([
            'name' => 'Html',
            'order' => 4,
            'level' => '90',
            'image' => new File('resources/assets/images/skills/html.svg')
        ]);

        $this->skills->create([
            'name' => 'JS',
            'order' => 5,
            'level' => '85',
            'image' => new File('resources/assets/images/skills/js.svg')
        ]);

        $this->skills->create([
            'name' => 'Postgresql',
            'order' => 6,
            'level' => '80',
            'image' => new File('resources/assets/images/skills/postgresql.svg')
        ]);

        $this->skills->create([
            'name' => 'Mysql',
            'order' => 7,
            'level' => '80',
            'image' => new File('resources/assets/images/skills/mysql.svg')
        ]);

        $this->skills->create([
            'name' => 'SQL Server',
            'order' => 8,
            'level' => '80',
            'image' => new File('resources/assets/images/skills/sqlsrv.svg')
        ]);

        $this->skills->create([
            'name' => 'Git',
            'order' => 9,
            'level' => '80',
            'image' => new File('resources/assets/images/skills/git.svg')
        ]);

        $this->skills->create([
            'name' => 'React',
            'order' => 10,
            'level' => '80',
            'image' => new File('resources/assets/images/skills/react.svg')
        ]);

        $this->skills->create([
            'name' => 'Css',
            'order' => 11,
            'level' => '75',
            'image' => new File('resources/assets/images/skills/css.svg')
        ]);

        $this->skills->create([
            'name' => 'Docker',
            'order' => 12,
            'level' => '70',
            'image' => new File('resources/assets/images/skills/docker.svg')
        ]);

        $this->skills->create([
            'name' => 'Tailwind',
            'order' => 13,
            'level' => '60',
            'image' => new File('resources/assets/images/skills/tailwind.svg')
        ]);

        $this->skills->create([
            'name' => 'CI/CD',
            'order' => 14,
            'level' => '50',
            'image' => new File('resources/assets/images/skills/ci-cd.svg')
        ]);
    }
}
