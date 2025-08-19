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
                'en' => 'Barcelona, Cataluña, Spain',
                'es' => 'Barcelona, Cataluña, España',
                'ca' => 'Barcelona, Catalunya, Espanya',
            ],
            'linkedin' => 'guillem-dolcet',
            'github' => 'GuillemDolcet',
            'image' => new File('resources/assets/images/personalInfo/main-image.png'),
            'cv' => [
                'en' => new File('resources/assets/files/personalInfo/cv_en.pdf'),
                'es' => new File('resources/assets/files/personalInfo/cv_es.pdf')
            ],
        ]);
    }
}
