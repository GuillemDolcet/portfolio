<?php

namespace Database\Seeders;

use App\Repositories\PersonalInfo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;

class PersonalInfoSeeder extends Seeder
{
    /**
     * PersonalInfo repository instance.
     *
     * @param PersonalInfo $personalInfo
     */
    protected PersonalInfo $personalInfo;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(PersonalInfo $personalInfo)
    {
        $this->personalInfo = $personalInfo;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->personalInfo->create([
            'firstName' => 'Guillem',
            'lastName' => 'Dolcet',
            'email' => 'g.dolcet.jove@gmail.com',
            'date_of_birth' => Carbon::parse('18-09-2001'),
            'phone' => '+34 634 490 171',
            'location' => [
                'en' => 'Os de Balaguer, Cataluña, Spain',
                'es' => 'Os de Balaguer, Cataluña, España',
            ],
            'bio' => [
                'en' => "I'm a designer & developer with a passion for web design. I enjoy developing simple, clean and slick websites that provide real value to the end user. Thousands of clients have procured exceptional results while working with me. Delivering work within time and budget which meets client’s requirements is our moto.",
                'es' => "I'm a designer & developer with a passion for web design. I enjoy developing simple, clean and slick websites that provide real value to the end user. Thousands of clients have procured exceptional results while working with me. Delivering work within time and budget which meets client’s requirements is our moto.",
            ],
            'linkedin' => 'guillem-dolcet',
            'github' => 'GuillemDolcet',
            'image' => new File('resources/assets/images/personalInfo/main-image.png'),
            'cv' => new File('resources/assets/files/personalInfo/cv.pdf'),
        ]);
    }
}
