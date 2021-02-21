<?php
namespace App\Http\Model;

use App\Http\Model\Model;

class AdminPermission extends Model
{
    public $table = "admin_permissions";

    //权限属于哪个角色
    public function roles()
    {
        return $this->belongsToMany(\App\Http\Model\AdminRole::class,'admin_permission_role','permission_id','role_id')->withPivot(['permission_id','role_id']);
    }
    
    
}