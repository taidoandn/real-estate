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
}
