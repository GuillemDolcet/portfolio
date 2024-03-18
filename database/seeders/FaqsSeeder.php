<?php

namespace Database\Seeders;

use App\Repositories\Faqs;
use App\Repositories\Testimonials;
use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Faqs repository instance.
     *
     * @param Faqs $faqs
     */
    protected Faqs $faqs;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Faqs $faqs)
    {
        $this->faqs = $faqs;
    }


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->faqs->create([
            'question' => [
                'en' => 'hola',
                'es' => 'hola'
            ],
            'answer' => [
                'en' => 'adeu',
                'es' => 'adeu'
            ],
            'order' => 1
        ]);
    }
}
