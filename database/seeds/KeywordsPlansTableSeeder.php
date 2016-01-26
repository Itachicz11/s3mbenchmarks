<?php

use Illuminate\Database\Seeder;
use App\City;

class KeywordsPlansTableSeeder extends Seeder
{
	private $city;

    public function run()
    {
    	$this->city = City::create(['name' => 'Tampa']);

    	factory('App\KeywordsPlan', 5)->create()->each(function($u) {
    		$u->cities()->save( $this->city );
    	});
    }
}
