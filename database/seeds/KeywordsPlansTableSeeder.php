<?php

use Illuminate\Database\Seeder;

class KeywordsPlansTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('keywords_plans')->delete();
        
		\DB::table('keywords_plans')->insert(array (
			0 => 
			array (
				'id' => 1,
				'date' => '2015-09-17',
				'approved' => 1,
				'company_id' => 1,
				'created_at' => '2015-10-01 02:31:28',
				'updated_at' => '2015-10-01 03:36:03',
			),
			1 => 
			array (
				'id' => 2,
				'date' => '2015-09-09',
				'approved' => 1,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:34:27',
				'updated_at' => '2015-10-01 03:36:03',
			),
			2 => 
			array (
				'id' => 3,
				'date' => '2015-09-11',
				'approved' => 1,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:35:39',
				'updated_at' => '2015-10-01 03:36:05',
			),
		));
	}

}
