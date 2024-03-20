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
            'name' => 'JS',
            'order' => 4,
            'level' => '85',
            'image' => new File('resources/assets/images/skills/js.svg')
        ]);

        $this->skills->create([
            'name' => 'SQL',
            'order' => 5,
            'level' => '80',
            'image' => new File('resources/assets/images/skills/sql.svg')
        ]);

        $this->skills->create([
            'name' => 'Html',
            'order' => 6,
            'level' => '85',
            'image' => new File('resources/assets/images/skills/html.svg')
        ]);

        $this->skills->create([
            'name' => 'Css',
            'order' => 7,
            'level' => '75',
            'image' => new File('resources/assets/images/skills/css.svg')
        ]);

        $this->skills->create([
            'name' => 'Wordpress',
            'order' => 8,
            'level' => '65',
            'image' => new File('resources/assets/images/skills/wordpress.svg')
        ]);
    }
}
