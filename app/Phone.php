<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
protected $table="phones";
    protected $guarded=['id'];

    public function member()
    {
        return $this->hasOne("App\Member");
    }
}
