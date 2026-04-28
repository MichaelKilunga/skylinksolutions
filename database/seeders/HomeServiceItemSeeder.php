<?php

namespace Database\Seeders;

use App\Models\HomeServiceItem;
use Illuminate\Database\Seeder;

class HomeServiceItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Businesses & Organizations',
                'description' => 'Empowering startups and enterprises with smart automation and reliable ICT support for sustainable growth.',
                'image' => 'images/assets/project.PNG',
                'order' => 1,
            ],
            [
                'title' => 'Individuals & Entrepreneurs',
                'description' => 'Protecting homes and offices with smart security solutions and reliable networking systems.',
                'image' => 'images/assets/family.PNG',
                'order' => 2,
            ],
            [
                'title' => 'Government & Institutions',
                'description' => 'Providing secure surveillance and digital solutions that improve public service delivery and asset protection.',
                'image' => 'images/assets/Capture.PNG',
                'order' => 3,
            ],
        ];

        foreach ($items as $item) {
            HomeServiceItem::create($item);
        }
    }
}
