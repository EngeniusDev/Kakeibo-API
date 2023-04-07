<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spent_categories')->insert([
            [
                'category_name' => '食費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '日用品',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '衣服',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '美容',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '交通費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '医療費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '教育費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '光熱費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '交通費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '通信費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '住居費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '定期',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '交際費',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => 'タバコ',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => '日用品',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => 'その他',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
