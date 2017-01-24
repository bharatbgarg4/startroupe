<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public $timestamps = false;
	protected $fillable=['title','slug','imgUrl','preview'];

	public function users(){
		return $this->hasMany('App\User');
	}

	public function art_users(){
	    return $this->hasMany('App\User')->where('editor',false)->where('admin',false);
	}

	public function jobs(){
		return $this->hasMany('App\Job');
	}
}
