<?php

use Illuminate\Database\Seeder;
use App\KeywordsPlan;

class KeywordsTableSeeder extends Seeder
{
	private $keyword;

    public function run()
    {

    	$keywords_plans = KeywordsPlan::all();

    	foreach ($keywords_plans as $dd ) {

    		$this->keyword = $dd;

    		factory('App\Keyword', 3)->create()->each(function($u) {
    			$u->keywords_plan()->save( $this->keyword );
    		});

    	}
    }
}
