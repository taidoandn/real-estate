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
    Route::get('posts/{post}/conveniences','PostController@conveniences')->name('posts.conveniences');
    Route::get('posts/{post}/conveniences/{convenience}','PostController@convenienceById')->name('posts.convenienceById');
    Route::get('posts/{post}/detail','PostController@detail')->name('posts.detail');
    Route::get('posts/{post}/property_type','PostController@property_type')->name('posts.district');

    //Property Type controller
    Route::apiResource('property-types', 'PropertyTypeController')->except('edit','create');
    Route::get('property-types/{property_type}/posts','PropertyTypeController@posts')->name('property-types.posts');
    Route::get('property-types/{property_type}/posts/{post}','PropertyTypeController@postById')->name('property-types.post');

    //City Controller
    Route::resource('/cities', 'CityController')->only('index','show');
    Route::get('cities/{city}/districts','CityController@districts')->name('cities.districts');
    Route::get('cities/{city}/districts/{district}','CityController@districtById')->name('cities.districts');

    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
});


