<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'SkyLink Cloud Infrastructure Overhaul: Enhanced Performance for All Users',
                'category' => 'System Update',
                'image' => 'images/blog/software-update.png',
                'content' => 'We are thrilled to announce a significant upgrade to our core cloud infrastructure. This overhaul brings 40% faster load times and improved reliability for all our hosted systems, ensuring our customers experience seamless digital services.',
                'excerpt' => 'We are thrilled to announce a significant upgrade to our core cloud infrastructure. This overhaul brings 40% faster load times and improved reliability...',
                'author_name' => 'Michael Kilunga',
                'author_image' => 'images/about/mich.PNG',
                'is_published' => true,
                'published_at' => '2026-04-20 00:00:00',
            ],
            [
                'title' => 'Expanding fiber connectivity across Morogoro region',
                'category' => 'Infrastructure',
                'image' => 'images/blog/networking-news.png',
                'content' => 'SkyLink Solutions is partnering with local stakeholders to accelerate the deployment of high-speed fiber networks in underserved areas...',
                'excerpt' => 'SkyLink Solutions is partnering with local stakeholders to accelerate the deployment of high-speed fiber networks in underserved areas...',
                'author_name' => 'Michael Kilunga',
                'author_image' => 'images/about/mich.PNG',
                'is_published' => true,
                'published_at' => '2026-04-15 00:00:00',
            ],
            [
                'title' => 'Celebrating 5 Years of Digital Innovation',
                'category' => 'Company',
                'image' => 'images/slider/new/about.jpg',
                'content' => 'Looking back at our journey since 2021, we celebrate the milestones achieved and the trust our clients have placed in our ICT solutions...',
                'excerpt' => 'Looking back at our journey since 2021, we celebrate the milestones achieved and the trust our clients have placed in our ICT solutions...',
                'author_name' => 'Michael Kilunga',
                'author_image' => 'images/about/mich.PNG',
                'is_published' => true,
                'published_at' => '2026-04-10 00:00:00',
            ],
            [
                'title' => 'Upcoming Workshop: Digital Security for Small Businesses',
                'category' => 'Stakeholders',
                'image' => 'images/assets/offics.jpg',
                'content' => 'Join our experts next month for a free workshop on how to protect your business infrastructure from modern cyber threats...',
                'excerpt' => 'Join our experts next month for a free workshop on how to protect your business infrastructure from modern cyber threats...',
                'author_name' => 'Michael Kilunga',
                'author_image' => 'images/about/mich.PNG',
                'is_published' => true,
                'published_at' => '2026-04-05 00:00:00',
            ],
        ];

        foreach ($news as $item) {
            $item['slug'] = Str::slug($item['title']);
            News::create($item);
        }
    }
}
