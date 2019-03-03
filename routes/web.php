<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('frontend.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-logout','Auth\LoginController@userLogout')->name('user.logout');
Route::group(['prefix' => 'admin'], function () {
    Route:: get('/', 'AdminController@index')->name('admin.dashboard');
    Route:: get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route:: post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route:: get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['prefix' => 'ajax'], function () {
    Route::post('/upload-image','AjaxController@uploadImage')->name('ajax.upload');
    Route::get('/delete-image','AjaxController@deleteImage')->name('ajax.delete-image');
});

Route::group(['namespace' => 'Admin','prefix'=>'admin','as' => 'admin.'], function () {
    //Route: user
    Route::get('/users','UserController@getUsers')->name('api.users');
    Route::resource('user', 'UserController',['except'=>['create','show']]);

    //Route: role
    Route::get('/roles','RoleController@getRoles')->name('api.roles');
    Route::resource('role', 'RoleController',['except'=>['create','show']]);

    //Route: post
    Route::get('/posts','PostController@getPosts')->name('api.posts');
    Route::resource('post', 'PostController',['except'=>['show']]);

    Route::get('/image-view','PostController@storeImage')->name('store.image');
    Route::get('/districts','PostController@getDistricts')->name('api.districts');

});
