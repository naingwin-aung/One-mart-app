<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'phone' => '0974328743',
            'password' => Hash::make('password'),
            'image' => 'user.png',
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => 0,
            'phone' => '094565654',
            'password' => Hash::make('password'),
            'image' => 'user.png',
        ]);

        DB::table('users')->insert([
            'name' => 'deliver',
            'email' => 'deliver@gmail.com',
            'role' => 2,
            'phone' => '09838437488',
            'password' => Hash::make('password'),
            'image' => 'user.png',
        ]);
    }
}
