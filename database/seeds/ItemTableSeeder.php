<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,365) as $index) {
            DB::table('items')->insert([
                'category_id' => $faker->numberBetween($min = 1, $max = 11),
                'name' => $faker->name,
                'price' => $faker->numberBetween($min = 100, $max = 1000),
                'quantity' => $faker->numberBetween($min = 50, $max = 500),
                'date_of_purchase' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
            ]);
        }
    }
}
