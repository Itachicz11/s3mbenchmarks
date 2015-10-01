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
	    return $this->hasMany('App\Keyword');
	}

	/**
	 * Gets all approved keywords plans.
	 */
	public function getApproved()
	{
		return $this->keywordsPlans()->where('approved', 1)->get();
	}

}
