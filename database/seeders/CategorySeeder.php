<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::insert([
            [
                "name" => "Elektronik",
                "division" => "Tefa"
            ],
            [
                "name" => "Alat Dapur",
                "division" => "Tata Usaha"
            ],
            [
                "name" => "Dokumen",
                "division" => "Sarpras",
            ],
            [
                "name" => "Alat Kebersihan",
                "division" => "Sarpras"
            ]
        ]);
    }
}
