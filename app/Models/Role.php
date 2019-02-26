<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name','created_at','updated_at'];
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permissions', 'role_id', 'permission_id');
    }
}
