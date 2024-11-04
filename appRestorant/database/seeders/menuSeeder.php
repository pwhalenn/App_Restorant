<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            DB::table('menus')->insert([
                'name' => $faker->word,
                'category' => $faker->randomElement(['makanan utama', 'minuman', 'makanan penutup']),
                'price' => $faker->randomFloat(2, 10, 100), // Price between 10 and 100
                'availability' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}