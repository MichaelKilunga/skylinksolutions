<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CompanySetting::create([
            'address' => 'Post Building, Morogoro, Tanzania',
            'phone' => '+255 (0) 762 725 725',
            'email' => 'info@skylinksolutions.co.tz',
            'working_hours' => 'Monday to Saturday - 8:30 Am to 5:00 Pm',
            'facebook_url' => 'https://www.facebook.com/skylinksolutions',
            'twitter_url' => '#',
            'linkedin_url' => '#',
            'youtube_url' => 'https://www.youtube.com/@SkyLinkSolutions-Tz',
            'instagram_url' => '#',
            'google_map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32025.304492780353!2d37.70668992509314!3d-6.782833299999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185a59b1e6c2cced%3A0xf5a1959f238d0c1a!2sSKYLINK%20SOLUTIONS!5e1!3m2!1ssw!2stz!4v1766754537925!5m2!1ssw!2stz',
            
            // Home Page - About Section
            'about_image' => 'images/slider/new/about.jpg',
            'experience_years' => '5+',
            'experience_text' => 'Years of Excellence',
            'about_title' => 'Welcome to SkyLink Solutions',
            'about_subtitle' => 'Always here for you',
            'about_description_1' => 'We’re an adroit digital technology company with passionate and skillful expertise providing excellence digital experience in software development, ICT infrastructure, security and surveillance.',
            'about_description_2' => 'The company is using technology to create digital products and services with a belief of attaining a future digital world where innovation meets reality. Our solutions enable seamless communication and data management in both business and personal environments.',
            'about_feature_1' => 'Digital Innovation',
            'about_feature_2' => 'Expert Team',

            // Home Page - Nationwide Section
            'nationwide_title' => 'Nationwide Digital Connectivity',
            'nationwide_description' => 'We connect groups across the country through our premier ICT services. From Morogoro to every corner of Tanzania, we provide on-site support, software development, and infrastructure excellence. We’ve partnered with law firms, charities, construction companies, and more to drive digital transformation.',
            'nationwide_image' => 'images/all-icon/w.jpg',
        ]);
    }
}
