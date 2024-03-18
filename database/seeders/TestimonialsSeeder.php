<?php

namespace Database\Seeders;

use App\Repositories\Testimonials;
use Illuminate\Database\Seeder;

class TestimonialsSeeder extends Seeder
{
    /**
     * Skills repository instance.
     *
     * @param Testimonials $testimonials
     */
    protected Testimonials $testimonials;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Testimonials $testimonials)
    {
        $this->testimonials = $testimonials;
    }


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->testimonials->create([
            'name' => 'Maite',
            'job' => [
                'en' => 'asdfasf',
                'es' => 'sdfsdfsdf'
            ],
            'comment' => [
                'en' => 'sdfsdfsdf',
                'es' => 'sdfsdfsdf'
            ]
        ]);
    }
}
