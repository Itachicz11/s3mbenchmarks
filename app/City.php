<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];


	public function keywords_plan()
	{
		return $this->belongsToMany('App\KeywordsPlan');
	}

	/**
	 * If this was the last relation with this keyword (no other keywords plan is using this keyword.
	 * delete this keyword from keywrods table
	 *
	 */
	public function deleteLast()
	{
        if ( $this->keywords_plan()->count() < 1 ) {
            $this->delete();
        }
	}




}
