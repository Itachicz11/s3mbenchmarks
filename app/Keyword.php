<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'keywords';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['text'];


	public function keywords_plan()
	{
		return $this->belongsToMany('App\KeywordsPlan');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function page_ranks()
	{
		return $this->hasMany('App\PageRank');
	}

	/**
	 * If this was the last relation with this keyword (no other keywords plan is using this keyword),
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
