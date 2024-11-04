<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'table_number' => $faker->numberBetween(1, 20), // Random table number between 1 and 20
                'contact' => $faker->phoneNumber, // Generates a phone number
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}