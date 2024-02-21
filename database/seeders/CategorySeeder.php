<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookCategory::create(['category_name' => 'Adventure', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Biography', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Comics', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Fantasy', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Horror', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Mystery', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Romance', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Science-Fiction', 'created_by' => 1]);
        BookCategory::create(['category_name' => 'Thriller', 'created_by' => 1]);

    }
}
