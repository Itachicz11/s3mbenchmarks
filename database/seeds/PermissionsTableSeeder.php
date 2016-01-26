<?php

use Illuminate\Database\Seeder;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
	private $admin_role;

    public function run()
    {
    	$this->admin_role = Role::find(1);

        $neco = factory('App\Permission', 1)->create();

        $neco->role()->save( $this->admin_role );

    }
}
