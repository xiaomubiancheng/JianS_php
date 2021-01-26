<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\User;

class RegisterController extends Controller
{

    public function index()
    {
        return view('register/index');
    }

    public function register()
    {
        $this->validate(request(),[
            'name' => 'required|min:3|unique:users,name', //对用户名限制
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|confirmed',  //comfirmed对密码和重复密码进行验证
        ]);

        $password = bcrypt(request('password')); //加密
        $name = request('name');
        $email = request('email');
        $user = User::create(compact('name', 'email', 'password'));
        return redirect('/login');
    }
}
