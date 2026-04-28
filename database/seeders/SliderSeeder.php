<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'ICT Cleaning and Hygiene',
                'description' => 'Specialized in professional cleaning of ICT equipment: laptops, photocopiers, servers, and data racks. We ensure your critical infrastructure remains spotless and cable-aligned.',
                'image' => 'images/assets/hygiene/h3.PNG',
                'btn1_text' => 'Learn More',
                'btn1_url' => '/ict-cleaning',
                'btn2_text' => 'Get a Quote',
                'btn2_url' => '/contact',
                'order' => 1,
            ],
            [
                'title' => 'Web Design & Development',
                'description' => 'Crafting unique digital identities that make your business stand out. From interactive websites to powerful mobile applications, we build solutions that fulfill your vision.',
                'image' => 'images/slider/new/about.jpg',
                'btn1_text' => 'Our Solutions',
                'btn1_url' => '/software-development',
                'btn2_text' => 'Start a Project',
                'btn2_url' => '/contact',
                'order' => 2,
            ],
            [
                'title' => 'Meet Our Experts',
                'description' => 'A team of experienced specialists in ICT hygiene, server systems, and digital innovation. We combine years of expertise to deliver the most elaborate systems imaginable.',
                'image' => 'images/slider/team1.jpg',
                'btn1_text' => 'Work With Us',
                'btn1_url' => '/contact',
                'order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
