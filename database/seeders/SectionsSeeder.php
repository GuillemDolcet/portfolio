<?php

namespace Database\Seeders;

use App\Repositories\PersonalInfo;
use App\Repositories\Sections;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Sections repository instance.
     *
     * @param Sections $sections
     */
    protected Sections $sections;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Sections $sections)
    {
        $this->sections = $sections;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->sections->create([
            'name' => 'about',
            'tag' => [
                'es' => 'Sobre Mi',
                'en' => 'About Me'
            ],
            'title' => [
                'es' => 'Conóceme más',
                'en' => 'Know Me More'
            ],
            'description' => [
                'es' => "<h2 class='text-8 fw-400 mb-3'>Hola, soy <span class='fw-700 border-bottom border-3 border-primary'>Guillem Dolcet</span></h2><p class='text-5'>Soy un diseñador y desarrollador apasionado por el diseño web. Disfruto desarrollando sitios web sencillos, limpios y elegantes que aporten un valor real al usuario final. Miles de clientes han conseguido resultados excepcionales trabajando conmigo. Entregar el trabajo a tiempo y dentro del presupuesto que cumpla con los requisitos del cliente es nuestra moto.</p>",
                'en' => "<h2 class='text-8 fw-400 mb-3'>Hi, I'm <span class='fw-700 border-bottom border-3 border-primary'>Guillem Dolcet</span></h2><p class='text-5'>I'm a designer & developer with a passion for web design. I enjoy developing simple, clean and slick websites that provide real value to the end user. Thousands of clients have procured exceptional results while working with me. Delivering work within time and budget which meets client’s requirements is our moto.</p>"
            ]
        ]);

        $this->sections->create([
            'name' => 'services',
            'tag' => [
                'es' => '¿Qué hago?',
                'en' => 'What I Do?'
            ],
            'title' => [
                'es' => 'Cómo puedo ayudarle en su próximo proyecto',
                'en' => 'How I can help your next project'
            ]
        ]);

        $this->sections->create([
            'name' => 'resume',
            'tag' => [
                'es' => 'Resume',
                'en' => 'Currículum'
            ],
            'title' => [
                'es' => 'Resumen de mi currículum',
                'en' => 'A summary of My Resume'
            ]
        ]);

        $this->sections->create([
            'name' => 'hire',
            'tag' => [
                'es' => 'hire',
                'en' => 'hire'
            ],
            'title' => [
                'es' => '¿Le interesa trabajar conmigo?',
                'en' => 'Interested in working with me?'
            ]
        ]);


        $this->sections->create([
            'name' => 'portfolio',
            'tag' => [
                'es' => 'Portfolio',
                'en' => 'Portfolio'
            ],
            'title' => [
                'es' => 'Algunos de mis proyectos más recientes',
                'en' => 'Some of my most recent projects'
            ]
        ]);

        $this->sections->create([
            'name' => 'faq',
            'tag' => [
                'es' => 'FAQ',
                'en' => 'FAQ'
            ],
            'title' => [
                'es' => 'Preguntas frecuentes',
                'en' => 'Have any questions?'
            ]
        ]);

        $this->sections->create([
            'name' => 'testimonial',
            'tag' => [
                'es' => 'Los clientes hablan',
                'en' => 'Client Speak'
            ],
            'title' => [
                'es' => 'Lo que dicen algunos de mis clientes',
                'en' => 'What Some of my Clients Say'
            ]
        ]);

        $this->sections->create([
            'name' => 'contact',
            'tag' => [
                'es' => 'Contáctame',
                'en' => 'Contacty'
            ],
            'title' => [
                'es' => 'Pongámonos en contacto',
                'en' => "Let's get in touch"
            ],
            'description' => [
                'es' => "<p class='text-5 mb-5'>Me encanta hablar de nuevos proyectos y retos de diseño. Por favor, comparte toda la información posible para que podamos sacar el máximo partido de nuestra primera puesta al día.</p>",
                'en' => "<p class='text-5 mb-5'>I enjoy discussing new projects and design challenges. Please share as much info, as possible so we can get the most out of our first catch-up.</p>"
            ]
        ]);
    }
}
