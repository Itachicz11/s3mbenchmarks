<?php

use Illuminate\Database\Seeder;

class BenchmarksTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('benchmarks')->delete();
        
		\DB::table('benchmarks')->insert(array (
			0 => 
			array (
				'id' => 1,
				'date' => '2015-09-03',
				'company_id' => 1,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			1 => 
			array (
				'id' => 2,
				'date' => '2015-09-07',
				'company_id' => 1,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
		));
	}

}
