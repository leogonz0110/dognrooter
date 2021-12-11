<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach (range(1, 20) as $index) {
            \DB::table('products')->insert([
                'name' => $faker->text,
                'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'image' => "1639231158_images__header_720x.jpg",
            ]);
        }
    }
}
