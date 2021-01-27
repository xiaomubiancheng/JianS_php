<?php
namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    //用户的文章列表
    public function posts()
    {
        return $this->hasMany(\App\Http\Model\Post::class,'user_id','id');
    }
    //关注我的粉丝
    public function fans()
    {
        return $this->hasMany(\App\Http\Model\Fan::class,'star_id','id');
    }

    //我粉的人
    public function stars()
    {
        return $this->hasMany(\App\Http\Model\Fan::class, 'fan_id', 'id');
    }

    //关注某人
    public function doFan($uid)
    {
        $fan = new \App\Http\Model\Fan();
        $fan->star_id = $uid;
        return $this->stars()->save($fan);
    }

    //取消关注
    public function doUnfan($uid)
    {
        $fan = new \App\Http\Model\Fan();
        $fan->star_id = $uid;
        return $this->stars()->delete($fan);
    }

    //当前这个人是否被uid粉了
    public function hasFan($uid)
    {
        return $this->fans()->where('fan_id', $uid)->count();
    }

    //当前用户是否关注了uid
    public function hasStar($uid)
    {
        return $this->stars()->where('star_id',$uid)->count();
    }


}
