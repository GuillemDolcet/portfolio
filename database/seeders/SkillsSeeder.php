<?php

namespace Database\Seeders;

use App\Models\User;
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
     */
    public function run(User $user): void
    {
        $this->skills->create([
            'name' => 'Laravel',
            'order' => 1,
            'level' => '99',
            'image' => new File('resources/assets/images/skills/laravel.png')
        ], $user);

        $this->skills->create([
            'name' => 'JS',
            'order' => 3,
            'level' => '99',
            'image' => new File('resources/assets/images/skills/js.png')
        ], $user);

        $this->skills->create([
            'name' => 'Mysql',
            'order' => 4,
            'level' => '99',
            'image' => new File('resources/assets/images/skills/mysql.png')
        ], $user);

        $this->skills->create([
            'name' => 'Postgres',
            'order' => 5,
            'level' => '99',
            'image' => new File('resources/assets/images/skills/postgres.png')
        ], $user);

        $this->skills->create([
            'name' => 'Html',
            'order' => 6,
            'level' => '99',
            'image' => new File('resources/assets/images/skills/html.png')
        ], $user);

        $this->skills->create([
            'name' => 'Css',
            'order' => 7,
            'level' => '99',
            'image' => new File('resources/assets/images/skills/css.png')
        ], $user);
    }
}
