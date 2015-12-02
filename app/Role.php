<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	protected $table = "roles";


	protected $fillable = ["role_name"];


	public function permissions()
	{
		return $this->hasMany('App\Permission');
	}

	public function user()
	{
		return $this->belongsToMany('App\User');
	}

}
