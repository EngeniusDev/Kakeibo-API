<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('income_categories')->insert([
        [
            'name' => '給料',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => 'お小遣い',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => '賞与',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => '副業',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => '投資',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => '臨時収入',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => 'その他',
            'created_at' => date('Y-m-d H:i:s'),
        ],
    ]);

    }
}
