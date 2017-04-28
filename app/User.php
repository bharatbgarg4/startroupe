<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword;

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
	protected $fillable = ['name', 'bio','username','imgUrl','birthDate','lastJob','lastJobDetails','company','height','skinColor','eyesColor','chest','waist','hips','hairColor','house','street','city','state','pinCode','married','travel','language','talent_id','location_id','facebook','youtube','twitter','linkedin','mobile','vmobile','otp',
	'views','likes', 'email', 'password','viewed','admin','editor','artist','token'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function articles(){
		return $this->hasMany('App\Article');
	}

	public function talent(){
		return $this->belongsTo('App\Talent');
	}

	public function location(){
		return $this->belongsTo('App\Location');
	}

	public function discussions(){
		return $this->hasMany('App\Discussion');
	}

	public function jobs(){
		return $this->hasMany('App\Job');
	}

	public function scopeAdmin($query){
		return $query->where('admin',true);
	}

	public function scopeEditor($query){
		return $query->where('editor',true)->where('admin',false);
	}

	public function scopeUser($query){
		return $query->where('editor',false)->where('admin',false);
	}
}
