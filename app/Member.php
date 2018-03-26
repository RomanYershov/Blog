<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table="members";
    protected $guarded=['id'];

    public function phone()
    {
        return $this->belongsTo("App\Phone");
    }
}
