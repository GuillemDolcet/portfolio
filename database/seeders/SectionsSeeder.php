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
            'name' => 'home',
            'tag' => [
                'es' => 'Inicio',
                'en' => 'Home'
            ],
            'title' => [
                'es' => "Hola, soy un",
                'en' => "Hi, I'm a"
            ],
            'description' => [
                'es' => '<div class="typed-strings"><p>Backend</p><p>Developer</p></div><h2 class="text-21 fw-600 text-uppercase mb-0 ms-n1"><span class="typed"></span></h2>',
                'en' => '<div class="typed-strings"><p>Backend</p><p>Developer</p></div><h2 class="text-21 fw-600 text-uppercase mb-0 ms-n1"><span class="typed"></span></h2>',
            ],
            'show_header' => true
        ]);

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
                'es' => "<h2 class='text-8 fw-400 mb-3'>Hola, soy <span class='fw-700 border-bottom border-3 border-primary '>Guillem Dolcet</span></h2><p class='text-5 text-justify'>Soy un desarrollador backend especializado en PHP/Laravel, con una sólida base en la construcción de APIs y una experiencia amplia que se extiende a tecnologías full stack. A lo largo de mi carrera, he dedicado mi enfoque a dominar PHP/Laravel, permitiéndome diseñar y desarrollar soluciones backend complejas con eficiencia y precisión. También poseo competencias en tecnologías front-end, lo que me capacita para contribuir en todo el espectro del desarrollo de aplicaciones web.</p>",
                'en' => "<h2 class='text-8 fw-400 mb-3'>Hi, I'm <span class='fw-700 border-bottom border-3 border-primary'>Guillem Dolcet</span></h2><p class='text-5 text-justify'>I am a backend developer specialized in PHP/Laravel, with a solid foundation in building APIs and extensive experience that extends to full stack technologies. Throughout my career, I have dedicated my focus to mastering PHP/Laravel, allowing me to design and develop complex backend solutions with efficiency and precision. I also possess skills in front-end technologies, which enables me to contribute across the entire spectrum of web application development.</p>"
            ],
            'show_header' => true
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
            ],
            'show_header' => true
        ]);

        $this->sections->create([
            'name' => 'resume',
            'tag' => [
                'es' => 'Currículum',
                'en' => 'Resume'
            ],
            'title' => [
                'es' => 'Resumen de mi currículum',
                'en' => 'A summary of My Resume'
            ],
            'show_header' => true
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
            ],
            'show_header' => false
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
            ],
            'show_header' => true
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
            ],
            'show_header' => true
        ]);

        $this->sections->create([
            'name' => 'contact',
            'tag' => [
                'es' => 'Contáctame',
                'en' => 'Contact'
            ],
            'title' => [
                'es' => 'Contácteme',
                'en' => "Contact me"
            ],
            'description' => [
                'es' => "¡Gracias por visitar mi portfolio! Si tienes proyectos en mente o necesitas un desarrollador web experto, me encantaría saber de ti. Completa el formulario para ponerte en contacto.",
                'en' => "Thanks for visiting my portfolio! If you have projects in mind or need an expert web developer, I'd love to hear from you. Fill out the form to get in touch."
            ],
            'show_header' => true
        ]);
    }
}
