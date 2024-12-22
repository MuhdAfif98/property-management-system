<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Full access to the system.',
                'permissions' => json_encode(['manage_users', 'manage_roles', 'view_reports']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Moderator',
                'slug' => 'moderator',
                'description' => 'Limited access to moderate content and manage users.',
                'permissions' => json_encode(['manage_users', 'moderate_content']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Resident',
                'slug' => 'resident',
                'description' => 'Access to resident-specific features.',
                'permissions' => json_encode(['view_announcements', 'book_facilities']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Visitor',
                'slug' => 'visitor',
                'description' => 'Limited access for guests or temporary users.',
                'permissions' => json_encode(['view_announcements']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}