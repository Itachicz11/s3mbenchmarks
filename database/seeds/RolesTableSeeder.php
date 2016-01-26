<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Role', 1)->create(['role_name' => 'Admin']);
    	factory('App\Role', 1)->create(['role_name' => 'Employee']);
    }
}
