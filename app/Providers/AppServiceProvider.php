<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use App\Models\City;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Convenience;
use App\Models\PropertyType;

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
            'frontend.partial.search-form',
            'frontend.post.edit',
            'frontend.post.create',
            'backend.post.create',
            'backend.post.edit'
        ];
        View::composer($views, function ($view) {
            $cities = City::get();
            $conveniences = Convenience::get();
            $property_types = PropertyType::get();
            $view->with(['cities'=>$cities,'conveniences'=>$conveniences,'property_types'=>$property_types]);
        });
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
