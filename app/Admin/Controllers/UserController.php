<?php
namespace App\Admin\Controllers;
use App\Http\Model\AdminUser;

class UserController extends Controller
{
    public function index()
    {
        $users = AdminUser::paginate(10);
        return view('admin.user.index',compact('users'));
    }
    //管理员创建页面
    public function create()
    {
        return view('admin.user.add');
    }

    //创建操作
    public function store()
    {

        $this->validate(request() , [
            'name' => 'required|min:3',
            'password'=>'required'
        ]);

        $name = request('name');
        $password = bcrypt(request('password'));

       AdminUser::create(compact('name','password'));

        return redirect('admin/users');
    }

    // 角色的权限
    public function role(\App\Http\Model\AdminUser $user)
    {
        $roles = \App\Http\Model\AdminRole::all();
        $myRoles = $user->roles;
        return view('/admin/user/role', compact('roles', 'myRoles', 'user'));
    }

    // 保存权限
    public function storeRole(\App\Http\Model\AdminUser $user)
    {
        $this->validate(request(),[
            'roles' => 'required|array'
        ]);

        $roles = \App\Http\Model\AdminRole::find(request('roles'));
        $myRoles = $user->roles;

        // 对已经有的权限
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $role) {
            $user->roles()->save($role);
        }

        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role) {
            $user->deleteRole($role);
        }
        return back();
    }

}