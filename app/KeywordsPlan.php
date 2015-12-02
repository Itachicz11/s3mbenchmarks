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
	protected $fillable = ['date', 'approved', 'keyword', 'city'];


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
		return $this->belongsToMany('App\Keyword');
	}

	public function cities() {
		return $this->belongsToMany('App\City');
	}


	/**
	 * take an array fo keywords and attaches them to a keywords plan.
	 * @param array $keywords an array of keywords from a form table
	 * @return void attaches keywords
	 */
	public function attach_keyword($keywords)
	{

        foreach ($keywords as $value) {

            $keyword = Keyword::where('text', '=', $value)->first();

            if ($keyword === null) {
                $keyword = new Keyword;
                $keyword->text = $value;
                $keyword->save();

                $this->keywords()->save($keyword);
            } else {
                $this->keywords()->save($keyword);
            }

        }
	}

	/**
	 * take an array fo cities and attaches them to a keywords plan.
	 * @param array $cities an array of cities from a form table
	 * @return void attaches cities
	 */
	public function attach_city($cities)
	{

        foreach ($cities as $value) {

            $city = City::where('name', '=', $value)->first();

            if ($city === null) {
                $city = new City;
                $city->name = $value;
                $city->save();

                $this->cities()->save($city);
            } else {
                $this->cities()->save($city);
            }

        }
	}

}
