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

    //Property Type controller
    Route::apiResource('property-types', 'PropertyTypeController')->except('edit','create');
    Route::get('property-types/{property_type}/posts','PropertyTypeController@posts')->name('property-types.posts');
    Route::get('property-types/{property_type}/posts/{post}','PropertyTypeController@postById')->name('property-types.post');

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


