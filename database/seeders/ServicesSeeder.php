<?php

namespace Database\Seeders;

use App\Repositories\Services;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;

class ServicesSeeder extends Seeder
{
    /**
     * Services repository instance.
     *
     * @param Services $services
     */
    protected Services $services;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->services->create([
            'title' => [
                'es' => 'Web Design',
                'en' => 'Web Design'
            ],
            'description' => [
                'es' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text.",
                'en' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text.",
            ],
            'image' => new File('resources/assets/images/services/web-design.svg'),
            'order' => 1,
        ]);

        $this->services->create([
            'title' => [
                'es' => 'Web Development',
                'en' => 'Web Development'
            ],
            'description' => [
                'es' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text.",
                'en' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text.",
            ],
            'image' => new File('resources/assets/images/services/web-development.svg'),
            'order' => 1,
        ]);
    }
}
