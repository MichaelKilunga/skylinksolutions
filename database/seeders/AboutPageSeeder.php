<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = \App\Models\CompanySetting::first();
        if ($setting) {
            $setting->update([
                'vision_title' => 'Vision',
                'vision_description' => 'To create a digital world where innovation meets the real world.',
                'mission_title' => 'Mission',
                'mission_description' => 'Accelerate the construction of the future digital society by using innovation and technology to transform problem-solving ideas to reality.',
                'why_choose_us_title' => 'Why Choose Us',
                'why_choose_us_subtitle' => 'Delivering excellence through passion, innovation, and expertise.',
                'software_projects_count' => '10',
                'networking_systems_count' => '150',
                'security_systems_count' => '100',
                'automation_systems_count' => '1',
            ]);
        }

        $features = [
            [
                'title' => 'Comprehensive Services',
                'description' => 'We’re an adroit digital technology company with passionate and skillful expertise providing excellence digital experience in software development (website, Mobile Application, POS Systems, Database Design), ICT infrastructure (Networking- Local Area Network, Internet Access, Intercom systems, Audio and Video doorbell), security and surveillance (CCTV Camera, Electric Fencing, Access Control systems, Fire Alarm system, Automotive gate motor), Graphics Design (Posters, Brochures, flyer), Supplying Computer Accessories (Laptops, Desktop Computers) with full ICT support and maintenance.',
                'icon' => 'fa-plus-circle',
                'order' => 1,
            ],
            [
                'title' => '5+ Years of Experience',
                'description' => 'With more than 5 years of ICT experience, we have achieved knowledge, skills, and expertise in an extensive range of technologies application type and industries.',
                'icon' => 'fa-book',
                'order' => 2,
            ],
            [
                'title' => 'Quality Assurance',
                'description' => 'We have a great team that is extremely innovative and passionate about their work. Thereby you will get original, groundbreaking qualitative services for your business. Our designers and developers are specialized and trained in the latest technologies.',
                'icon' => 'fa-user-circle-o',
                'order' => 3,
            ],
            [
                'title' => 'Complete Project Management',
                'description' => 'From complex project to simple ones, we are experts in all kinds of digital projects. Our services include a complete project management services within the proposed budget.',
                'icon' => 'fa-check-square-o',
                'order' => 4,
            ],
            [
                'title' => 'Information Security & Data Protection',
                'description' => 'Information security management for ICT and IT-related services are an important area of concern for every organization. We apply proper measures to ensure the confidentiality of information. Our team members are fully trained in advanced data protection training.',
                'icon' => 'fa-shield',
                'order' => 5,
            ],
        ];

        foreach ($features as $feature) {
            \App\Models\AboutFeature::updateOrCreate(['title' => $feature['title']], $feature);
        }
    }
}
