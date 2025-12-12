<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ...existing code...

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = [
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'phone' => '081234567890',
        ];

        DB::table('users')->insert($adminUser);
    }
}