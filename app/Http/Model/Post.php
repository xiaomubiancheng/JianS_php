<?php
namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

//默认post=>posts
class Post extends Model
{
    //projected $table = "othername"
    //protected $guarded; //不可以注入的字段
    //protected $fillable; //可以注入数据字段

//    protected $fillable = ["title","content"];

    protected $guarded = [];
    //关联用户
    public function user()
    {
//        return $this->belongsTo('App\User','user_id','id');
        return $this->belongsTo('App\Http\Model\User');
    }

}
