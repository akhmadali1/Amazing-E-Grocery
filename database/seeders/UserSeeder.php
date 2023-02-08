<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => ' ',
            'email' => 'admin@admin.com',
            'display_picture_link' => 'administrator.png',
            'password' => bcrypt('admin123'),
            'gender' => 'male',
            'role' => 'Admin',
        ]);
    }
}
