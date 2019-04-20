<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];
    public function admins()
    {
        return $this->belongsToMany('App\Models\Admin', 'admin_roles', 'role_id', 'admin_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permissions', 'role_id', 'permission_id');
    }

    public function roleHasPermission($permission){
        return !! optional($this->permissions)->contains('name',$permission);
    }

    //Same with
    // public function roleHasPermission($permission){
    //     foreach ($this->permissions() as $per) {
    //         if ($permission === $per->name) {
    //             return true;
    //         }
    //         return false;
    //     }
    // }
}
