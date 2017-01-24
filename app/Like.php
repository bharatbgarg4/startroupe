<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = false;
    protected $fillable=['user_id','profile_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
