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
            'category_name' => '給料',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'category_name' => 'お小遣い',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'category_name' => '賞与',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'category_name' => '副業',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'category_name' => '投資',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'category_name' => '臨時収入',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'category_name' => 'その他',
            'created_at' => date('Y-m-d H:i:s'),
        ],
    ]);

    }
}
