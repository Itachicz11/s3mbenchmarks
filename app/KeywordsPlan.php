<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeywordsPlan extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'keywords_plans';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['date', 'keywords', 'cities', 'approved'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['company_id', 'company'];


	public function company()
	{
	    return $this->belongsTo('App\Company');
	}

}
