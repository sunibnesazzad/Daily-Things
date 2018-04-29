<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\BaseSettings\Settings;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        $admin->assignRole(Settings::$admin_role);

        $client = User::find(2);
        $client->assignRole(Settings::$client_role);
    }
}
