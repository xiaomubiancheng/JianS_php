<?php
namespace App\Http\Model;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

//默认post=>posts
class Post extends Model
{
    use Searchable;

    // 定义索引的type
    public function searchableAs()
    {
        return 'posts';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
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

    //评论模型
    public function comments()
    {
        return $this->hasMany('\App\Http\Model\Comment')->orderBy('created_at','desc');
    }


    // 判断一个用户是否已经给这篇文章点赞了
    public function zan($user_id)
    {
        return $this->hasOne(\App\Http\Model\Zan::class)->where('user_id', $user_id);
    }

    //所有赞
    public function zans()
    {
        return $this->hasMany(\App\Http\Model\Zan::class)->orderBy('created_at', 'desc');
    }
}
