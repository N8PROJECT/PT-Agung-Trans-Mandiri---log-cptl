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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'status' => 'active'
        ]);
        User::create([
            'name' => 'courier',
            'email' => 'courier@gmail.com',
            'password' => bcrypt('courier'),
            'role' => 'courier',
            'status' => 'active'
        ]);
    }
}
