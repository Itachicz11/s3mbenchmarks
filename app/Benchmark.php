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

	/**
	 * @param  array | $id | ids of the benchmarks to compare
	 * @return array | $results | copmare page ranks in provided benchmarks
	 */
	public function compare( $second ) {
		$results = [];

		foreach ($this->page_ranks as $key => $page_rank) {
			$keyword = $page_rank->keyword->text;

			$value = $this->page_ranks[$key]->value - $second->page_ranks[$key]->value;

			array_push($results, $value);
		}

		return $results;
	}

}
