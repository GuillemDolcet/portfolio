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
                'en' => 'What is your experience developing web applications with Laravel and PHP?',
                'es' => '¿Cuál es tu experiencia desarrollando aplicaciones web con Laravel y PHP?'
            ],
            'answer' => [
                'en' => 'My experience in web application development spans 4 years working intensively with PHP and the last 3 years specializing in Laravel. During this time, I have had the opportunity to work on a wide range of projects ranging from custom content management systems (CMS), e-commerce applications, to complex enterprise solutions and use of different APIs. I have worked closely with multidisciplinary teams, which has allowed me to deepen my knowledge of agile development practices and learn to adapt quickly to changing project needs. Throughout my career, I have focused on writing clean and maintainable code, applying best development practices and design patterns. I have implemented numerous outstanding functionalities using Laravel, such as authentication, advanced session handling, payment gateway integration, etc.',
                'es' => 'Mi experiencia en el desarrollo de aplicaciones web abarca 4 años trabajando intensamente con PHP y los últimos 3 años especializándome en Laravel. Durante este tiempo, he tenido la oportunidad de trabajar en una amplia gama de proyectos que van desde sistemas de gestión de contenido (CMS) personalizados, aplicaciones de comercio electrónico, hasta soluciones empresariales complejas y uso de diferentes APIs. He colaborado estrechamente con equipos multidisciplinarios, lo que me ha permitido profundizar en prácticas de desarrollo ágil y aprender a adaptarme rápidamente a las necesidades cambiantes de los proyectos. A lo largo de mi carrera, me he enfocado en escribir código limpio y mantenible, aplicando las mejores prácticas de desarrollo y patrones de diseño. He implementado numerosas funcionalidades destacadas utilizando Laravel, como autenticación, manejo avanzado de sesiones, integración de pasarelas de pago, etc.'
            ],
            'order' => 1
        ]);

        $this->faqs->create([
            'question' => [
                'en' => 'What attracted you to backend development and why did you choose PHP and Laravel as your main technologies?',
                'es' => '¿Qué te atrajo del desarrollo backend y por qué elegiste PHP y Laravel como tus principales tecnologías?'
            ],
            'answer' => [
                'en' => 'I was attracted to the complex logic and problem solving behind backend development. I chose PHP because of its wide adoption and supportive community. Laravel caught my eye because of its elegant syntax, robustness and features that speed up development, such as database migrations and the Eloquent ORM.',
                'es' => 'Me atrajo la lógica compleja y la resolución de problemas detrás del desarrollo backend. Elegí PHP por su amplia adopción y comunidad de apoyo. Laravel me llamó la atención por su elegante sintaxis, robustez y las características que aceleran el desarrollo, como las migraciones de bases de datos y el ORM Eloquent.'
            ],
            'order' => 2
        ]);

        $this->faqs->create([
            'question' => [
                'en' => 'Have you used Laravel to develop RESTful APIs and what are your best practices for their design?',
                'es' => '¿Has utilizado Laravel para desarrollar APIs RESTful? ¿Cuáles son tus mejores prácticas para su diseño?'
            ],
            'answer' => [
                'en' => 'Yes, I have developed multiple RESTful APIs with Laravel. My best practices include following REST principles, such as the correct use of HTTP methods and status codes. I also emphasize the importance of clear and complete documentation, using tools such as Swagger or Postman.',
                'es' => 'Sí, he desarrollado múltiples APIs RESTful con Laravel. Mis mejores prácticas incluyen seguir los principios REST, como el uso correcto de los métodos HTTP y códigos de estado. También enfatizo la importancia de una documentación clara y completa, utilizando herramientas como Swagger o Postman.'
            ],
            'order' => 3
        ]);

        $this->faqs->create([
            'question' => [
                'en' => 'In addition to your experience with Laravel and PHP, do you have skills in other technologies or programming languages?',
                'es' => 'Además de tu experiencia con Laravel y PHP, ¿tienes habilidades en otras tecnologías o lenguajes de programación?'
            ],
            'answer' => [
                'en' => 'Yes, in addition to my solid experience with Laravel and PHP, I have skills in several other technologies essential for modern web development. I have a good command of JavaScript, which allows me to develop dynamic frontend interactions and improve the user experience. In addition, I have experience working with SQL for database management, which allows me to design, optimize and manage efficient relational databases. I am also familiar with Docker, which allows me to containerize applications, thus facilitating the deployment and scalability of projects in any environment. Finally, I have solid knowledge in HTML and CSS, fundamental skills for any web developer, which allow me to build and style attractive and responsive user interfaces. These complementary skills have allowed me to work effectively on multidisciplinary projects and contribute to both the backend and frontend.',
                'es' => 'Sí, además de mi sólida experiencia con Laravel y PHP, poseo habilidades en varias otras tecnologías esenciales para el desarrollo web moderno. Tengo un buen manejo de JavaScript, lo que me permite desarrollar interacciones dinámicas en el frontend y mejorar la experiencia del usuario. Además, tengo experiencia trabajando con SQL para la gestión de bases de datos, lo que me permite diseñar, optimizar y administrar bases de datos relacionales eficientes. También estoy familiarizado con Docker, lo cual me permite contenerizar aplicaciones, facilitando así el despliegue y la escalabilidad de los proyectos en cualquier entorno. Por último, tengo conocimientos sólidos en HTML y CSS, habilidades fundamentales para cualquier desarrollador web, que me permiten construir y estilizar interfaces de usuario atractivas y responsivas. Estas habilidades complementarias me han permitido trabajar eficazmente en proyectos multidisciplinarios y contribuir tanto en el backend como en el frontend.'
            ],
            'order' => 4
        ]);

        $this->faqs->create([
            'question' => [
                'en' => 'How do you keep up with the latest trends and updates in backend development and Laravel?',
                'es' => '¿Cómo te mantienes actualizado con las últimas tendencias y actualizaciones en el desarrollo backend y Laravel?'
            ],
            'answer' => [
                'en' => 'I keep myself updated by reading technology blogs, participating in online forums and communities such as Laravel.io and Stack Overflow, and attending conferences and meetups. I also follow various Laravel and PHP developers and thought leaders on social media and GitHub to keep up with the latest news and best practices.',
                'es' => 'Me mantengo actualizado leyendo blogs de tecnología, participando en foros y comunidades en línea como Laravel.io y Stack Overflow, y asistiendo a conferencias y meetups. También sigo a varios desarrolladores y líderes de opinión en Laravel y PHP en redes sociales y GitHub para estar al tanto de las últimas noticias y mejores prácticas.'
            ],
            'order' => 5
        ]);
    }
}
