<?php

namespace Database\Seeders;

use App\Models\AdminService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Software Development',
                'description' => 'Custom software solutions tailored to your business needs, from web apps to enterprise systems.',
                'icon' => 'fa-code',
                'is_active' => true,
            ],
            [
                'title' => 'CCTV Camera',
                'description' => 'Advanced surveillance systems with remote monitoring and high-definition clarity.',
                'icon' => 'fa-video-camera',
                'is_active' => true,
            ],
            [
                'title' => 'Electric Fence',
                'description' => 'High-security perimeter protection with smart monitoring and alarm integration.',
                'icon' => 'fa-bolt',
                'is_active' => true,
            ],
            [
                'title' => 'Biometric & Access Control',
                'description' => 'Secure your premises with modern biometric systems and automated access management.',
                'icon' => 'fa-id-card-o',
                'is_active' => true,
            ],
            [
                'title' => 'Computer Networking',
                'description' => 'Robust networking infrastructure, from structured cabling to server configurations.',
                'icon' => 'fa-sitemap',
                'is_active' => true,
            ],
            [
                'title' => 'ICT Maintenance',
                'description' => 'Professional maintenance services for your hardware, software, and infrastructure.',
                'icon' => 'fa-wrench',
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            AdminService::updateOrCreate(
                ['slug' => Str::slug($service['title'])],
                $service
            );
        }
    }
}
