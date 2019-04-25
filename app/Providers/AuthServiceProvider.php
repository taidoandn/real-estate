<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            if ($user->email === 'admin@demo.com') {
                return true;
            }
        });
        Gate::define('isSuperAdmin',function($user){
            return $user->email === 'admin@demo.com';
        });
        if(! $this->app->runningInConsole()){
            foreach (Permission::all() as $permission) {
                Gate::define($permission->name,function(Admin $user) use($permission){ // $user here is a admin
                    return $user->hasPermission($permission->name);
                });
            }
        }
    }
}
