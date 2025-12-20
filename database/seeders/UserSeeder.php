<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'superadmin@library.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make(env('ADMIN_PW', 'password')),
                'role' => 'super_admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@library.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make(env('ADMIN_PW', 'password')),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'testuser@library.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make(env('ADMIN_PW', 'password')),
                'role' => 'user',
            ]
        );
    }
}
