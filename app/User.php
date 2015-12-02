<?php

namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * retrieves if user has right givven permission
     * @param integer $permission_id the ID of a permission, you can find it in the permissions table.
     * @return boolean
     */
    public function can_use($permission_id)
    {
        return DB::table('permission_role')->where(['role_id' => $this->role_id, 'permission_id' => $permission_id])->exists();
    }


}
