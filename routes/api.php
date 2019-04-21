<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.'], function () {
    //Post Controller
    Route::apiResource('posts', 'PostController')->except('edit','create');
    Route::get('my-posts', 'PostController@postByAuth');

    //Property Type controller
    Route::apiResource('property-types', 'PropertyTypeController')->only('index','show');

    //Distance controller
    Route::apiResource('distances', 'DistanceController')->only('index','show');

    //Convenience controller
    Route::apiResource('conveniences', 'ConvenienceController')->only('index','show');

    //PostType controller
    Route::apiResource('post-types', 'PostTypeController')->only('index','show');

    //City Controller
    Route::resource('/cities', 'CityController')->only('index','show');
    Route::get('cities/{city}/districts','CityController@districts')->name('cities.districts');

    //Auth Controller
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


