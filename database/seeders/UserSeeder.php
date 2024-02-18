<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'abdullah.ivan@yahoo.com',
            'password' => bcrypt('#Admin789'),
            'role' => 'admin',
            'status' => 'active',
            'permissions' => json_encode(['admin_dashboard', 'capital_branch', 'report_pengiriman', 'users'])
        ]);
        User::create([
            'name' => 'Test Admin',
            'email' => 'testadmin@yahoo.com',
            'password' => bcrypt('testadmin'),
            'role' => 'admin',
            'status' => 'active',
            'permissions' => json_encode(['admin_dashboard', 'report_pengiriman'])
        ]);
        User::create([
            'name' => 'courier',
            'email' => 'courier@gmail.com',
            'password' => bcrypt('courier'),
            'role' => 'courier',
            'status' => 'active',
            'permissions' => json_encode([])
        ]);
        User::create([
            'name' => 'courier test',
            'email' => 'testcourier@gmail.com',
            'password' => bcrypt('courier9'),
            'role' => 'courier',
            'status' => 'active',
            'permissions' => json_encode(['courier_dashboard'])
        ]);
    }
}
