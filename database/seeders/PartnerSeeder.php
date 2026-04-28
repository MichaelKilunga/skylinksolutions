<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'BARAKA POLYCLINIC HOSPITAL',
                'description' => 'The hospital is a recognized health care provider situated in Morogoro, Tanzania.',
                'activity' => 'ICT SOLUTIONS',
                'logo_path' => 'images/partners/baraka.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'NATIONAL PROSECUTION SERVICE',
                'description' => 'The National Prosecution Service (NPS) in Tanzania is a vital independent government agency responsible for prosecuting criminal cases on behalf of the state.',
                'activity' => 'CCTV CAMERA, INTERCOM, WIFI',
                'logo_path' => 'images/partners/nps.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'PASTORALIST WOMEN DEVELOPMENT IMPETUS',
                'description' => 'The hospital is a recognized health care provider situated in Morogoro, Tanzania..',
                'activity' => 'ICT SOLUTIONS',
                'logo_path' => 'images/partners/pwdi.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'ST PETER JUNIOR SEMINARY SCHOOL',
                'description' => 'The hospital is a recognized health care provider situated in Morogoro, Tanzania..',
                'activity' => 'LAN & DOOR LOCK ACCESS CONTROL',
                'logo_path' => 'images/partners/stpeter.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($partners as $partner) {
            \App\Models\Partner::create($partner);
        }
    }
}
