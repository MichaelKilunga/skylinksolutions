<?php

namespace Database\Seeders;

use App\Models\CoreValue;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'title' => 'Customer Obsession',
                'icon' => 'fa-heart',
                'description' => 'We start with the customer and work backwards, ensuring every solution adds real value.',
                'order' => 1,
            ],
            [
                'title' => 'Results Oriented',
                'icon' => 'fa-bullseye',
                'description' => 'We focus on delivering measurable impact and high-quality outcomes for our clients.',
                'order' => 2,
            ],
            [
                'title' => 'Digital Innovation',
                'icon' => 'fa-rocket',
                'description' => 'We embrace cutting-edge technology to create forward-thinking solutions.',
                'order' => 3,
            ],
            [
                'title' => 'Team Working & Diversity',
                'icon' => 'fa-users',
                'description' => 'We believe in the power of collaboration and diverse perspectives.',
                'order' => 4,
            ],
            [
                'title' => 'Simplicity at its Best',
                'icon' => 'fa-magic',
                'description' => 'We strip away complexity to deliver intuitive and elegant systems.',
                'order' => 5,
            ],
        ];

        foreach ($values as $value) {
            CoreValue::create($value);
        }
    }
}
