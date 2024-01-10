<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\Skills;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;

class HobbiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param User $user
     * @return void
     */
    public function run(User $user): void
    {
        $user->hobbies()->create([
            'name' => [
                'en' => 'Travel',
                'es' => 'Viajar',
            ],
            'order' => 1,
            'image' => new File('resources/assets/images/hobbies/plane.png')
        ]);
        $user->hobbies()->create([
            'name' => [
                'en' => 'Videogames',
                'es' => 'Videojuegos',
            ],
            'order' => 1,
            'image' => new File('resources/assets/images/hobbies/videogames.png')
        ]);
    }
}
