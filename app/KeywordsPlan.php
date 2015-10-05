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
	protected $fillable = ['date', 'approved', 'keyword'];


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
		return $this->hasMany('App\Keyword');
	}

}
