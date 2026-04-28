<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceFeature;
use App\Models\ServiceProject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data to avoid duplicates if re-run
        Service::query()->delete();

        $services = [
            [
                'title' => 'Software Development',
                'short_description' => 'Custom Digital Solutions. Transforming Your Vision into Reality.',
                'description' => 'At SkyLink Solutions, we understand that every business is unique. Our expert developers craft tailor-made web and mobile applications that not only solve complex problems but also provide a seamless user experience. We combine cutting-edge technology with intuitive design to help you stand out in the digital landscape.',
                'icon' => 'fa-code',
                'banner_image' => 'images/bannerbg/banner-bg.png',
                'images' => [
                    ['image' => 'images/assets/web1.jpg', 'title' => 'Web Development'],
                    ['image' => 'images/assets/web2.jpg', 'title' => 'Mobile Development'],
                    ['image' => 'images/assets/pro2.jpg', 'title' => 'SaaS Solutions'],
                    ['image' => 'images/assets/web5.PNG', 'title' => 'Enterprise Systems'],
                ],
                'features' => [
                    ['title' => 'Management Systems', 'icon' => 'fa-desktop', 'description' => 'Bespoke ERP, CRM, and internal management tools for schools, hospitals, and corporate entities.'],
                    ['title' => 'POS & Inventory', 'icon' => 'fa-shopping-cart', 'description' => 'Advanced Point of Sale systems with real-time inventory tracking and comprehensive reporting.'],
                    ['title' => 'Mobile Applications', 'icon' => 'fa-mobile', 'description' => 'Native and cross-platform mobile apps for Android and iOS that engage users and drive results.'],
                ],
                'projects' => [
                    ['title' => 'Tsokoni', 'category' => 'E-commerce Marketplace', 'image' => 'images/assets/soft/soft14.PNG', 'link' => 'https://soko-kuu-chief-kingalu.skylinksolutions.co.tz/'],
                    ['title' => 'Messina Hotel', 'category' => 'Booking Management', 'image' => 'images/assets/soft/soft1.PNG', 'link' => 'https://messinaprimierhotel.co.tz/'],
                    ['title' => 'N.G.Os Sector', 'category' => 'Information Portal', 'image' => 'images/assets/soft/soft4.PNG'],
                    ['title' => 'Makazi Mtandaoni', 'category' => 'Real Estate Platform', 'image' => 'images/assets/soft/soft3.PNG'],
                ]
            ],
            [
                'title' => 'Computer Networking',
                'short_description' => 'Fast and reliable way of sharing information and resources within a business.',
                'description' => 'Every business needs a computer network; be it a simple local area network (LAN) or a complex wide area network (WAN), Remark network is a fast and reliable way of sharing information and resources within a business. The main areas we undertake our on-site services are all over the country.',
                'icon' => 'fa-network-wired',
                'banner_image' => 'images/bannerbg/banner-bg.png',
                'images' => [
                    ['image' => 'images/assets/networking/net14.PNG', 'title' => 'Networking Infrastructure'],
                    ['image' => 'images/assets/networking/net15.PNG', 'title' => 'Data Center Setup'],
                    ['image' => 'images/assets/networking/net16.PNG', 'title' => 'Server Management'],
                ],
                'features' => [
                    ['title' => 'LAN & WAN', 'icon' => 'fa-network-wired', 'description' => 'Design and implementation of Local and Wide Area Networks for seamless and high-speed data transmission.'],
                    ['title' => 'Server Management', 'icon' => 'fa-server', 'description' => 'Providing centralized storage capacity, effective communication setups, and reliable server infrastructure.'],
                    ['title' => 'Wireless Access', 'icon' => 'fa-wifi', 'description' => 'Deploying robust, scalable, and secure wireless networks for enterprise and institutional clients.'],
                ],
                'projects' => [
                    ['title' => 'Mwatex', 'category' => 'Mwanza', 'image' => 'images/assets/networking/net9.jpg'],
                    ['title' => 'Mzumbe', 'category' => 'Morogoro', 'image' => 'images/assets/networking/net12.jpg'],
                    ['title' => 'Chamwino', 'category' => 'Dodoma', 'image' => 'images/assets/networking/net1.jpg'],
                    ['title' => '21st Century', 'category' => 'Morogoro', 'image' => 'images/assets/networking/net5.jpg'],
                ]
            ],
            [
                'title' => 'ICT Cleaning & Hygiene',
                'short_description' => 'Protect Your Critical Infrastructure. Professional Maintenance.',
                'description' => 'We specialize in the professional cleaning of ICT equipment, server rooms, and data centers. Our program is designed to secure your devices from unnecessary damage by ensuring the hygiene and optimal performance of your infrastructure.',
                'icon' => 'fa-broom',
                'banner_image' => 'images/bannerbg/banner-bg.png',
                'images' => [
                    ['image' => 'images/assets/hygiene/clean.jpg', 'title' => 'Professional Cleaning'],
                ],
                'features' => [
                    ['title' => 'Telephone Cleaning', 'icon' => 'fa-phone', 'description' => 'Deep sanitization of handsets and dialing pads.'],
                    ['title' => 'Monitor Cleaning', 'icon' => 'fa-desktop', 'description' => 'Anti-static treatment for LCD/LED screens.'],
                    ['title' => 'Keyboard Deep-Clean', 'icon' => 'fa-keyboard', 'description' => 'Extraction of debris and surface polishing.'],
                    ['title' => 'Laptop Maintenance', 'icon' => 'fa-laptop', 'description' => 'Vent cleaning and screen sanitization.'],
                ],
                'projects' => []
            ],
            [
                'title' => 'Electric Fencing Installation',
                'short_description' => 'Farm & Property Protection.',
                'description' => 'Electric fence provides more protected from high impact damage from cattle and livestock, ensuring safety for both animals and property perimeters while offering reliable deterrence against unauthorized entry.',
                'icon' => 'fa-bolt',
                'banner_image' => 'images/bannerbg/banner-bg.png',
                'images' => [
                    ['image' => 'images/assets/ele5.PNG', 'title' => 'Fencing Setup'],
                    ['image' => 'images/assets/ele3.PNG', 'title' => 'Perimeter Security'],
                    ['image' => 'images/assets/ele4.PNG', 'title' => 'High Voltage Deterrent'],
                ],
                'features' => [
                    ['title' => 'High Voltage Deterrent', 'icon' => 'fa-bolt', 'description' => 'Safe but effective electric shock deterrents to keep intruders out and protect your sensitive areas.'],
                    ['title' => 'Agricultural Fencing', 'icon' => 'fa-tractor', 'description' => 'Specialized perimeter defense systems designed specifically to protect crop plantations and livestock.'],
                    ['title' => 'Commercial Protection', 'icon' => 'fa-shield-alt', 'description' => 'Robust physical security barriers for offices, warehousing, and commercial properties.'],
                ],
                'projects' => [
                    ['title' => 'Msamvu', 'category' => 'Morogoro', 'image' => 'images/assets/electric/e4.jpg'],
                ]
            ],
            [
                'title' => 'CCTV Camera Installation',
                'short_description' => 'Surveillance Systems.',
                'description' => 'We provide Surveillance Service which involves the deployment of CCTV Cameras, Censors, Digital Videos and other Access control devices. These surveillance systems have the ability and capability to instantly capture events.',
                'icon' => 'fa-video',
                'banner_image' => 'images/bannerbg/banner-bg.png',
                'images' => [
                    ['image' => 'images/assets/cc3.PNG', 'title' => 'Surveillance Camera'],
                    ['image' => 'images/assets/cc1.PNG', 'title' => 'Monitoring System'],
                ],
                'features' => [
                    ['title' => 'Analog & Digital CCTV', 'icon' => 'fa-video', 'description' => 'High-quality video surveillance solutions tailored for both traditional setups and modern IP-based digital environments.'],
                    ['title' => 'Solar Powered Systems', 'icon' => 'fa-solar-panel', 'description' => 'Remote monitoring for farms and plantations equipped with off-grid solar-powered CCTV cameras.'],
                    ['title' => 'Smart Alert Tracking', 'icon' => 'fa-bell', 'description' => 'Advanced motion detection and sensor integration to trigger instant alerts and alarms.'],
                ],
                'projects' => [
                    ['title' => 'Msamvu', 'category' => 'Morogoro', 'image' => 'images/assets/cc2.PNG'],
                    ['title' => 'Muheza', 'category' => 'Tanga', 'image' => 'images/assets/cc1.PNG'],
                ]
            ],
            [
                'title' => 'Access Control System',
                'short_description' => 'Security & Automation.',
                'description' => 'Access control keeps confidential information such as customer data, personally identifiable information, and intellectual property from falling into the wrong hands.',
                'icon' => 'fa-id-card',
                'banner_image' => 'images/bannerbg/banner-bg.png',
                'images' => [
                    ['image' => 'images/assets/acc1.PNG', 'title' => 'Biometric Access'],
                ],
                'features' => [
                    ['title' => 'Biometric Systems', 'icon' => 'fa-fingerprint', 'description' => 'Advanced biometric attendance and access control systems for secure and reliable identity verification.'],
                    ['title' => 'Card Access', 'icon' => 'fa-id-card', 'description' => 'Smart card and RFID solutions for seamless and controlled entry into restricted areas and facilities.'],
                    ['title' => 'Lock Systems', 'icon' => 'fa-door-closed', 'description' => 'Automated electronic door locks and gates for enhanced perimeter and internal security management.'],
                ],
                'projects' => [
                    ['title' => 'Msamvu', 'category' => 'Morogoro', 'image' => 'images/assets/access/acc9.jpg'],
                ]
            ],
        ];

        foreach ($services as $sData) {
            $service = Service::create([
                'title'             => $sData['title'],
                'slug'              => Str::slug($sData['title']),
                'icon'              => $sData['icon'],
                'banner_image'      => $sData['banner_image'],
                'short_description' => $sData['short_description'],
                'description'       => $sData['description'],
                'status'            => true,
            ]);

            foreach ($sData['images'] as $img) {
                ServiceImage::create([
                    'service_id' => $service->id,
                    'image'      => $img['image'],
                    'title'      => $img['title'],
                ]);
            }

            foreach ($sData['features'] as $feat) {
                ServiceFeature::create([
                    'service_id'  => $service->id,
                    'title'       => $feat['title'],
                    'icon'        => $feat['icon'],
                    'description' => $feat['description'],
                ]);
            }

            foreach ($sData['projects'] as $proj) {
                ServiceProject::create([
                    'service_id' => $service->id,
                    'title'      => $proj['title'],
                    'category'   => $proj['category'],
                    'image'      => $proj['image'],
                    'link'       => $proj['link'] ?? null,
                ]);
            }
        }
    }
}
