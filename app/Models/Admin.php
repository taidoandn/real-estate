<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'admin_roles', 'admin_id', 'role_id');
    }

    public function userHasRole($role){
        return !! optional($this->roles)->contains('name',$role); // !! : return boolean
    }

    public function userHasPermission($permission){
        foreach ($this->roles as $role) {
            if ($role->roleHasPermission($permission)) {
                return true;
            }
        }
    }
}
