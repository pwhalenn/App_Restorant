<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Fetching `customer_id` and `menu_id` for seeding
        $customerIds = DB::table('customers')->pluck('customer_id'); // Use customer_id
        $menuIds = DB::table('menus')->pluck('menu_id'); // Use menu_id

        foreach (range(1, 5) as $index) {
            DB::table('orders')->insert([
                'customer_id' => $faker->randomElement($customerIds),
                'menu_id' => $faker->randomElement($menuIds),
                'quantity' => $faker->numberBetween(1, 5),
                'status' => $faker->randomElement(['sedang disiapkan', 'siap diantar', 'selesai']),
                'order_date' => $faker->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
