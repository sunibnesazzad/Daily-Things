<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Bulbs']);
        Category::create(['name' => 'Flowers']);
        Category::create(['name' => 'Fruits']);
        Category::create(['name' => 'Fungi']);
        Category::create(['name' => 'Leaves']);
        Category::create(['name' => 'Roots']);
        Category::create(['name' => 'Seeds']);
        Category::create(['name' => 'Stems']);
        Category::create(['name' => 'JQuery']);
        Category::create(['name' => 'Tubers']);
        Category::create(['name' => 'spices']);
    }
}
