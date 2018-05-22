<?php

use Illuminate\Database\Seeder;
use App\Month;

class monthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Month::create(['name' => 'January']);
        Month::create(['name' => 'February']);
        Month::create(['name' => 'March']);
        Month::create(['name' => 'April']);
        Month::create(['name' => 'May']);
        Month::create(['name' => 'June']);
        Month::create(['name' => 'July']);
        Month::create(['name' => 'August']);
        Month::create(['name' => 'September']);
        Month::create(['name' => 'October']);
        Month::create(['name' => 'November']);
        Month::create(['name' => 'December']);
    }
}
