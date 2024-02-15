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
            'status' => 'active'
        ]);
        User::create([
            'name' => 'courier',
            'email' => 'courier@gmail.com',
            'password' => bcrypt('#User789'),
            'role' => 'courier',
            'status' => 'active'
        ]);
    }
}
