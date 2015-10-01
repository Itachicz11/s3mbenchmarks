<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('migrations')->delete();
        
		\DB::table('migrations')->insert(array (
			0 => 
			array (
				'migration' => '2014_10_12_000000_create_users_table',
				'batch' => 1,
			),
			1 => 
			array (
				'migration' => '2014_10_12_100000_create_password_resets_table',
				'batch' => 1,
			),
			2 => 
			array (
				'migration' => '2015_08_14_235541_create_companies_table',
				'batch' => 1,
			),
			3 => 
			array (
				'migration' => '2015_08_16_172745_create_benchmarks_table',
				'batch' => 1,
			),
			4 => 
			array (
				'migration' => '2015_08_17_195552_create_keywordsPlans_table',
				'batch' => 1,
			),
			5 => 
			array (
				'migration' => '2015_09_25_194050_create_keywords_table',
				'batch' => 1,
			),
			6 => 
			array (
				'migration' => '2015_10_01_022727_create_page_ranks_table',
				'batch' => 1,
			),
		));
	}

}
