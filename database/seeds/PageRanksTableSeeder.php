<?php

use Illuminate\Database\Seeder;

class PageRanksTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('page_ranks')->delete();
        
		\DB::table('page_ranks')->insert(array (
			0 => 
			array (
				'id' => 1,
				'benchmark_id' => 1,
				'keyword_id' => 3,
				'value' => 5,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			1 => 
			array (
				'id' => 2,
				'benchmark_id' => 1,
				'keyword_id' => 4,
				'value' => 2,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			2 => 
			array (
				'id' => 3,
				'benchmark_id' => 1,
				'keyword_id' => 5,
				'value' => 1,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			3 => 
			array (
				'id' => 4,
				'benchmark_id' => 1,
				'keyword_id' => 6,
				'value' => 3,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			4 => 
			array (
				'id' => 5,
				'benchmark_id' => 1,
				'keyword_id' => 7,
				'value' => 7,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			5 => 
			array (
				'id' => 6,
				'benchmark_id' => 1,
				'keyword_id' => 8,
				'value' => 2,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			6 => 
			array (
				'id' => 7,
				'benchmark_id' => 1,
				'keyword_id' => 9,
				'value' => 1,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			7 => 
			array (
				'id' => 8,
				'benchmark_id' => 1,
				'keyword_id' => 10,
				'value' => 3,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			8 => 
			array (
				'id' => 9,
				'benchmark_id' => 1,
				'keyword_id' => 11,
				'value' => 2,
				'created_at' => '2015-10-01 03:36:31',
				'updated_at' => '2015-10-01 03:36:31',
			),
			9 => 
			array (
				'id' => 10,
				'benchmark_id' => 2,
				'keyword_id' => 3,
				'value' => 2,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			10 => 
			array (
				'id' => 11,
				'benchmark_id' => 2,
				'keyword_id' => 4,
				'value' => 3,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			11 => 
			array (
				'id' => 12,
				'benchmark_id' => 2,
				'keyword_id' => 5,
				'value' => 4,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			12 => 
			array (
				'id' => 13,
				'benchmark_id' => 2,
				'keyword_id' => 6,
				'value' => 1,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			13 => 
			array (
				'id' => 14,
				'benchmark_id' => 2,
				'keyword_id' => 7,
				'value' => 5,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			14 => 
			array (
				'id' => 15,
				'benchmark_id' => 2,
				'keyword_id' => 8,
				'value' => 2,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			15 => 
			array (
				'id' => 16,
				'benchmark_id' => 2,
				'keyword_id' => 9,
				'value' => 3,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			16 => 
			array (
				'id' => 17,
				'benchmark_id' => 2,
				'keyword_id' => 10,
				'value' => 1,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
			17 => 
			array (
				'id' => 18,
				'benchmark_id' => 2,
				'keyword_id' => 11,
				'value' => 2,
				'created_at' => '2015-10-01 03:36:54',
				'updated_at' => '2015-10-01 03:36:54',
			),
		));
	}

}
