<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benchmark extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'benchmarks';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['date', 'data'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['company_id'];


	public function company()
	{
	    return $this->belongsTo('App\Company');
	}

	public function keywords()
	{
	    return $this->hasManyThrough('App\Keyword', 'App\Company');
	}

	public function page_ranks()
	{
		return $this->hasMany('App\PageRank');
	}
}
