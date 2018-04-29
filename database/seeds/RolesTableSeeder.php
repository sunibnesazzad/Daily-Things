<?php

use App\BaseSettings\Settings;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Settings::$roles as $role){
            Role::create(['name' => $role]);
        }
    }
}
