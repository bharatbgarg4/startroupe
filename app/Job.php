<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable=['content','title','user_id','location_id','talent_id'];

    public function talent(){
    	return $this->belongsTo('App\Talent');
    }

    public function location(){
    	return $this->belongsTo('App\Location');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function offers(){
        return $this->hasMany('App\Offer');
    }
}
