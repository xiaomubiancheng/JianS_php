<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function show()
    {
        return view('user/show');
    }
    //关注用户
    public function fan()
    {
        return;
    }
    //取消关注
    public function unfan()
    {

    }
}
