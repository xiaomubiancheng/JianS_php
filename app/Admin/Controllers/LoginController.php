<?php
namespace App\Admin\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:2',
            'password'=>'required|min:4|max:6',
        ]);
        $user = request(['name','password']);
        if(true==\Auth::guard('admin')->attempt($user)){
            return redirect('/admin/home/index');
        }
        return \Redirect::back()->withErrors("用户名或者密码错误");
    }

    public function  logout()
    {
        \Auth::guard('admin')->logout();
        Session()->flush();
        return redirect('/admin/login');
    }

}