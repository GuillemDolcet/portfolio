<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\Hobbies;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;

class HobbiesSeeder extends Seeder
{
    /**
     * Hobbies repository instance.
     *
     * @param Hobbies $hobbies
     */
    protected Hobbies $hobbies;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Hobbies $hobbies)
    {
        $this->hobbies = $hobbies;
    }

    /**
     * Seed the application's database.
     *
     * @param User $user
     * @return void
     */
    public function run(User $user): void
    {
        $this->hobbies->create([
            'name' => [
                'en' => 'Travel',
                'es' => 'Viajar',
            ],
            'order' => 1,
            'image' => new File('resources/assets/images/hobbies/plane.png')
        ], $user);

        $this->hobbies->create([
            'name' => [
                'en' => 'Videogames',
                'es' => 'Videojuegos',
            ],
            'order' => 1,
            'image' => new File('resources/assets/images/hobbies/videogames.png')
        ], $user);
    }
}
