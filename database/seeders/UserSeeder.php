<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'isAdmin' => true,
            ],
            [
                'name' => 'user',
                'email' => 'user@user',
                'email_verified_at' => now(),
                'password' => Hash::make('user'),
                'remember_token' => Str::random(10),
                'isAdmin' => false,
            ],
        ]);
    }
}
