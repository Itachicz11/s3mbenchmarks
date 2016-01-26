<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'url', 'email'];


	/**
	 * Get the benchmarks.
	 */
	public function benchmarks()
	{
	    return $this->hasMany('App\Benchmark');
	}

	/**
	 * Get the keywords plans.
	 */
	public function keywordsPlans()
	{
	    return $this->hasMany('App\KeywordsPlan');
	}

	public function keywords()
	{
		$keywords = Keyword::whereHas('keywords_plan', function($q)
		{
			$q->where('company_id', '=', $this->id);

		})->get();


		return $keywords;
	}

	/**
	 * Gets all approved keywords plans.
	 */
	public function getApproved()
	{
		$collection  = $this->keywordsPlans;

		$filtered = $collection->filter(function ($item) {

			return $item->approved == 1;
		});

		return $filtered;
	}

}
