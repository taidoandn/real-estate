<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Distance;
use App\Models\Convenience;
use App\Models\PropertyType;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\PostType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {

        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
        Schema::defaultStringLength(191);
        $views = [
            'frontend.search._sidebar',
            'frontend.partial._search-form',
            'frontend.post.edit',
            'frontend.post.create',
            'backend.post.create',
            'backend.post.edit'
        ];
        View::composer($views, function ($view) {
            $cities = City::get();
            $conveniences = Convenience::get();
            $property_types = PropertyType::get();
            $distances = Distance::get();
            $post_type = PostType::get();
            $view->with([
                'cities'=>$cities,
                'conveniences'=>$conveniences,
                'property_types'=>$property_types,
                'distances' =>$distances,
                'post_type' =>$post_type,
                ]);
        });
        if(! $this->app->runningInConsole() ){
            \Auth::guard('admin')->loginUsingId(1);
            \Auth::guard('web')->loginUsingId(1);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
