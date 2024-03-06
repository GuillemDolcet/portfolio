<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    public function run(): void
    {
        Language::create([
            'name' => 'es',
            'image' => 'spain.png'
        ]);
        Language::create([
            'name' => 'en',
            'image' => 'uk.png'
        ]);
    }
}
