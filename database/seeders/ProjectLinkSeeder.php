<?php

namespace Database\Seeders;

use App\Models\ProjectLink;
use Illuminate\Database\Seeder;

class ProjectLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            ['name' => 'PILLPOINTONE', 'url' => 'https://pillpointone.com', 'order' => 1],
            ['name' => 'BIZPOINTONE', 'url' => 'https://bizpointone.com', 'order' => 2],
            ['name' => 'AFYADIGITAL', 'url' => 'https://afyadigito.skylinksolutions.co.tz', 'order' => 3],
            ['name' => 'SKY PUSH', 'url' => 'https://skypush.skylinksolutions.co.tz', 'order' => 4],
            ['name' => 'Financial Management', 'url' => 'https://fmis.skylinksolutions.co.tz', 'order' => 5],
            ['name' => 'ST.MARYS HEALTHCARE', 'url' => 'https://stmary.skylinksolutions.co.tz', 'order' => 6],
            ['name' => 'SKYATTEND', 'url' => 'https://skyattend.com', 'order' => 7],
        ];

        foreach ($projects as $project) {
            ProjectLink::create($project);
        }
    }
}
