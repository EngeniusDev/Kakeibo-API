<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Income;
use App\Models\Spent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            IncomeCategorySeeder::class,
            SpentCategorySeeder::class,
        ]);
        
        Income::factory(10)->create();
        Spent::factory(10)->create();
    }
}
