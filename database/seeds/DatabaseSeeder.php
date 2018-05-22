<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $tables = DB::select('SHOW TABLES');

//        foreach ($tables as $table){
//            if($table->Tables_in_homestead != 'migrations'){
//                DB::table($table->Tables_in_homestead)->truncate();
//            }
//        }

        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AssignRoleSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(monthTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
