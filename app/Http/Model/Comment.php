<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comments";

    protected $guarded =[];     //**

    public function post()
    {
        return $this->belongsTo('\App\Http\Model\Post', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('\App\Http\Model\User', 'user_id', 'id');
    }
}
