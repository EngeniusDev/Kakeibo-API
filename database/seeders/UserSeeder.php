<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'test@test',
                'password' => Hash::make('11111111'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'test2@test',
                'password' => Hash::make('22222222'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'test3@test',
                'password' => Hash::make('33333333'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
