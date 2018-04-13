<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table="news";
    protected  $guarded=['id'];

    public function user(){
       return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany("App\Comment");
    }
}
