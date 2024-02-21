<?php

namespace Database\Seeders;

use App\Models\BookRental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookRentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            BookRental::create([
                'user_id' => rand(1, 102),
                'book_id' => $faker->numberBetween(1, 50),
                'rent' => $faker->randomElement(['Y','N']),
                'updated_by' => rand(1, 102),
            ]);
        }
    }
}
