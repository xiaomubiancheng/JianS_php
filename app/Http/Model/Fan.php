<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $guarded =  [];

    //粉丝用户
    public function fuser()
    {
        return $this->hasOne(\App\Htttp\Model\User::class, 'id','fan_id');
    }
    //被关联用户
    public function suser()
    {
        return $this->hasOne(\App\Http\Model\User::class,'id','star_id');
    }

}
