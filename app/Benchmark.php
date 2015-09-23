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



	/**
	 * Retrieves an array of values that will be showed in comparision table
	 *
	 * @var id - id of benchmark to compare with
	 */
	public function compare($id)
	{
		$datasetFirst = $this->data;
		$datasetSecond = $this::find($id)->data;
		$comparedData = [];


		foreach ($datasetFirst as $key => $value) {
			$comparedData[$key] = $value - $datasetSecond[$key];
		}

		return $comparedData;
	}


	/**
	 * Decode json array taken from database
	 *
	 * @var id - id of benchmark to compare with
	 */
	public function getDataAttribute($value)
	{
		return json_decode($value);
	}

}
