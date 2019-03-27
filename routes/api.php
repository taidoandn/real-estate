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
    Route::apiResource('posts', 'PostController')->except('edit','create');
    Route::get('posts/{post}/conveniences','PostController@conveniences')->name('posts.conveniences') ;
    Route::get('posts/{post}/conveniences/{convenience}','PostController@convenienceById')->name('posts.convenienceById') ;

    Route::apiResource('property-types', 'PropertyTypeController')->except('edit','create');
    Route::get('property-types/{property_type}/posts','PropertyTypeController@posts')->name('property-types.posts') ;
    Route::get('property-types/{property_type}/posts/{post}','PropertyTypeController@postById')->name('property-types.post') ;
});


