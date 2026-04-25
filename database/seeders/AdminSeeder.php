<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create super-admin role if it doesn't exist
        $role = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);

        // Create or update super admin user
        $admin = User::updateOrCreate(
            ['email' => 'info@skylinksolutions.co.tz'],
            [
                'name'     => 'SkyLink Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $admin->assignRole($role);
    }
}
