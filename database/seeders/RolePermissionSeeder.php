<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Define Comprehensive Permissions Contextual to SkyLink Solutions
        $permissions = [
            'access admin panel',
            'manage users',
            'view analytics',
            
            // Content & Website Management
            'edit website content',
            'manage testimonials',
            
            // Business Operations
            'manage products',
            'manage services',
            'manage projects',
            
            // CRM / Communication
            'manage client inquiries',
            'send push sms',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // 3. Create Roles & Assign Permissions systematically
        
        // ** Admin Role ** 
        // Has all possible permissions natively.
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(Permission::all());

        // ** Manager Role **
        // Oversees business operations, services, analytics, and content but cannot alter admin-level users.
        $managerRole = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $managerRole->givePermissionTo([
            'access admin panel', 
            'view analytics', 
            'edit website content', 
            'manage products', 
            'manage services', 
            'manage projects',
            'manage testimonials',
            'manage client inquiries',
            'send push sms'
        ]);

        // ** Sales & Support Role **
        // Focused solely on interacting with client analytics and inquiries.
        $supportRole = Role::firstOrCreate(['name' => 'support', 'guard_name' => 'web']);
        $supportRole->givePermissionTo([
            'access admin panel',
            'view analytics',
            'manage client inquiries'
        ]);

        // ** Visitor Role **
        // Basically an authenticated guest/client account. Mostly read-only natively.
        $visitorRole = Role::firstOrCreate(['name' => 'visitor', 'guard_name' => 'web']);

        // 4. Create Initial Default Users
        
        // System Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@skylinksolutions.co.tz'],
            [
                'name' => 'System Admin',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('admin');
        
        // Default Manager
        $manager = User::firstOrCreate(
            ['email' => 'manager@skylinksolutions.co.tz'],
            [
                'name' => 'Operations Manager',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );
        $manager->assignRole('manager');
        
        // Default Support Agent
        $support = User::firstOrCreate(
            ['email' => 'support@skylinksolutions.co.tz'],
            [
                'name' => 'Client Support Desk',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );
        $support->assignRole('support');
    }
}
