<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	public $timestamps = false;
    protected $fillable=['title','location_id','talent_id'];

    public function talent(){
    	return $this->belongsTo('App\Talent');
    }

    public function location(){
    	return $this->belongsTo('App\Location');
    }
}
