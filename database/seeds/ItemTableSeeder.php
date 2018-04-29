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
        foreach (range(1,100) as $index) {
            DB::table('items')->insert([
                'category_id' => $faker->numberBetween($min = 1, $max = 11),
                'name' => $faker->name,
                'price' => $faker->randomFloat($min = 10, $max = 100),
                'quantity' => $faker->numberBetween($min = 1, $max = 500),
                'date_of_purchase' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
            ]);
        }
    }
}
