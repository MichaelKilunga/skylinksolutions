<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminServiceSeeder::class,
            RolePermissionSeeder::class,
            AdminSeeder::class,
            ServiceSeeder::class,
            CompanySettingSeeder::class,
            SliderSeeder::class,
            CoreValueSeeder::class,
            HomeServiceItemSeeder::class,
            PartnerSeeder::class,
            NewsSeeder::class,
            ProjectLinkSeeder::class,
        ]);
    }
}
