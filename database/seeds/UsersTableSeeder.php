<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->delete();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'email' => 'test@gmail.com',
				'password' => '$2y$10$gWM.sYkHt2kP3sSv1GK0Y.qTYLx3ubbYvA9TOXOeDOCPmi9VVI.Di',
				'remember_token' => NULL,
				'created_at' => '2015-10-01 02:27:55',
				'updated_at' => '2015-10-01 02:27:55',
			),
		));
	}

}
