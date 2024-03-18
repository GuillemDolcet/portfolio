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
                'es' => 'Desarrollo de Aplicaciones Web Personalizadas',
                'en' => 'Web Development'
            ],
            'description' => [
                'es' => "Soluciones web únicas y a medida que se ajustan perfectamente a los requisitos específicos de tu negocio. Desde portales corporativos hasta plataformas de comercio electrónico, te ofrezco un desarrollo ágil y eficiente utilizando Laravel y PHP, garantizando aplicaciones robustas, escalables y seguras.",
                'en' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text.",
            ],
            'image' => new File('resources/assets/images/services/web-development.svg'),
            'order' => 1,
        ]);

        $this->services->create([
            'title' => [
                'es' => 'Mantenimiento y Actualización de Sitios Web',
                'en' => 'Web Site Maintenance and Updating'
            ],
            'description' => [
                'es' => "Mantén tu sitio web al día, seguro y en perfecto funcionamiento con mis servicios de mantenimiento y actualización. Incluye la implementación de las últimas características de seguridad, mejora de la funcionalidad existente, y optimización de la velocidad del sitio para una mejor experiencia de usuario.",
                'en' => "Keep your website up to date, secure and running smoothly with my maintenance and upgrade services. Includes implementing the latest security features, improving existing functionality, and optimizing site speed for a better user experience.",
            ],
            'image' => new File('resources/assets/images/services/web-design.svg'),
            'order' => 2,
        ]);

        $this->services->create([
            'title' => [
                'es' => 'Desarrollo y integración de APIs',
                'en' => 'Web Development'
            ],
            'description' => [
                'es' => "Desarrollo y integración de APIs RESTful personalizadas. Estas APIs son esenciales para aplicaciones móviles, integraciones de terceros, y automatizaciones, asegurando que tu servicio pueda crecer y adaptarse a nuevas necesidades.",
                'en' => "Development and integration of custom RESTful APIs. These APIs are essential for mobile applications, third-party integrations, and automations, ensuring that your service can grow and adapt to new needs.",
            ],
            'image' => new File('resources/assets/images/services/apis.svg'),
            'order' => 3,
        ]);
    }
}
