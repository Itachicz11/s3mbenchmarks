<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{


	protected $table = 'permissions';


	protected $fillable = ['permission_name'];


	public function role()
	{
		return $this->belongsToMany('App\Role');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

}
