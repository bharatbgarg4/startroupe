<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folio extends Model
{
    protected $fillable=['url','user_id','type'];
    public $timestamps = false;
}
