<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Model\User;

class UserController extends Controller
{
    //个人设置页面
    public function setting()
    {

    }

    //个人设置行为
    public function settingStore(Request $request)
    {

    }
    //个人中心页面
    public function show(User $user)
    {
        //个人信息, 包含关注/粉丝/文章数
        $user = User::withCount(['stars','fans','posts'])->find($user->id);
        //个人的文章列表,根据时间取10条
        $posts = $user->posts()->orderBy('created_at','desc')->take(10)->get();
        //关注的用户
        $stars = $user->stars;
        $susers = User::whereIn('id',$stars->pluck('star_id'))->withCount(['stars','fans','posts'])->get();
        //粉丝用户
        $fans = $user->fans;
        $fusers = User::whereIn('id',$fans->pluck('fan_id'))->withCount(['stars','fans','posts'])->get();

        return view('user/show',compact('user','posts','susers','fusers'));
    }
    //关注用户
    public function fan(User $user)
    {
        $me = \Auth::user();
        $me->doFan($user->id);
        return [
            'error'=> 0 ,
            'msg'=> ''
        ];
    }
    //取消关注
    public function unfan(User $user)
    {
        $me = \Auth::user();
//        \App\Fan::where('fan_id', $me->id)->where('star_id', $user->id)->delete();
        $me->doUnfan($user->id);
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
}
