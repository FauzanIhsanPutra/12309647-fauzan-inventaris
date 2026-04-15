<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
        \App\Models\User::create([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin',
        ]);
        // \App\Models\User::create([
        //     'name' => 'Admin3',
        //     'email' => 'admin3@gmail.com',
        //     'password' => bcrypt('admin12345'),
        //     'role' => 'admin',
        // ]);
        \App\Models\User::create([
            'name' => 'operator2',
            'email' => 'operator2@gmail.com',
            'password' => bcrypt('operator1234'),
            'role' => 'operator',
        ]);
    }
}
