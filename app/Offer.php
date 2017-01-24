<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = ['content','job_id','user_id'];
    protected $with = ['user','job'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function job(){
    	return $this->belongsTo('App\Job');
    }
}
