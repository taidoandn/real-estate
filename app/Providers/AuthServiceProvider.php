<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;

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
            if ($user->id === 1) {
                return true;
            }
        });
        Gate::define('isSuperAdmin',function($user){
            return $user->id === 1;
        });
        if(! $this->app->runningInConsole()){
            foreach (Permission::all() as $permission) {
                Gate::define($permission->name,function($user) use($permission){ // $user here is a admin
                    return $user->userHasPermission($permission);
                });
            }
        }
    }
}
