<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('companies')->delete();
        
		\DB::table('companies')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Test company',
				'url' => 'http://www.google.com',
				'email' => 'company@gmail.com',
				'created_at' => '2015-10-01 02:28:19',
				'updated_at' => '2015-10-01 02:28:19',
			),
		));
	}

}
