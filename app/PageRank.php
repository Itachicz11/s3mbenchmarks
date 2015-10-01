<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageRank extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'page_ranks';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['value'];


	public function keyword()
	{
		return $this->belongsTo('App\Keyword');
	}

	public function benchmark()
	{
		return $this->belongsTo('App\Benchmark');
	}

}
