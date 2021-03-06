<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductPerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            \DB::table('category_per_products')->insert([
                'product_id' => $index,
                'category_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
