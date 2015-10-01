<?php

use Illuminate\Database\Seeder;

class KeywordsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('keywords')->delete();
        
		\DB::table('keywords')->insert(array (
			0 => 
			array (
				'id' => 3,
				'text' => 'plumber tampa',
				'keywords_plan_id' => 1,
				'company_id' => 1,
				'created_at' => '2015-10-01 02:43:53',
				'updated_at' => '2015-10-01 02:43:53',
			),
			1 => 
			array (
				'id' => 4,
				'text' => 'plumber orlando',
				'keywords_plan_id' => 1,
				'company_id' => 1,
				'created_at' => '2015-10-01 02:45:46',
				'updated_at' => '2015-10-01 02:45:46',
			),
			2 => 
			array (
				'id' => 5,
				'text' => 'house repairs tampa',
				'keywords_plan_id' => 1,
				'company_id' => 1,
				'created_at' => '2015-10-01 02:45:46',
				'updated_at' => '2015-10-01 02:45:46',
			),
			3 => 
			array (
				'id' => 6,
				'text' => 'another keyword',
				'keywords_plan_id' => 2,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:35:08',
				'updated_at' => '2015-10-01 03:35:08',
			),
			4 => 
			array (
				'id' => 7,
				'text' => 'Lorem ipsum',
				'keywords_plan_id' => 2,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:35:08',
				'updated_at' => '2015-10-01 03:35:08',
			),
			5 => 
			array (
				'id' => 8,
				'text' => 'is dolor amet tampa',
				'keywords_plan_id' => 2,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:35:08',
				'updated_at' => '2015-10-01 03:35:08',
			),
			6 => 
			array (
				'id' => 9,
				'text' => 'plumber tampa',
				'keywords_plan_id' => 3,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:35:58',
				'updated_at' => '2015-10-01 03:35:58',
			),
			7 => 
			array (
				'id' => 10,
				'text' => 'plumber orlando',
				'keywords_plan_id' => 3,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:35:58',
				'updated_at' => '2015-10-01 03:35:58',
			),
			8 => 
			array (
				'id' => 11,
				'text' => 'house repairs tampa',
				'keywords_plan_id' => 3,
				'company_id' => 1,
				'created_at' => '2015-10-01 03:35:58',
				'updated_at' => '2015-10-01 03:35:58',
			),
		));
	}

}
