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
    return view('frontend.post.favorite');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@getSearch')->name('getSearch');
Route::post('/search', 'SearchController@postSearch')->name('postSearch');

Route::resource('/posts', 'PostController')->except('show');
Route::get('/posts/favorite-list','PostController@getFavoritePosts')->name('posts.favorite-list');
Route::get('/posts/{slug}','PostController@show')->name('posts.show');

//Favorite
Route::post('/posts/favorite','FavoriteController')->name('posts.favorite');


Route::group(['prefix' => 'profile','middleware'=>'auth'], function () {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/update', 'ProfileController@update')->name('profile.update');
    Route::get('/change-pass', 'ProfileController@changePassword')->name('profile.change-pass');
});

Route::get('/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix' => 'ajax','as'=>'ajax.'], function () {
    Route::post('/upload-image','AjaxController@uploadImage')->name('upload-image');
    Route::get('/delete-image','AjaxController@deleteImage')->name('delete-image');
    Route::get('/districts','AjaxController@getDistricts')->name('districts');
});

Route::group(['prefix' => 'admin'], function () {
    Route:: get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route:: post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route:: get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['namespace' => 'Admin','prefix'=>'admin','as' => 'admin.','middleware'=>'auth:admin'], function () {
    Route:: get('/', 'AdminController@index')->name('dashboard');

    //Route: user
    Route::get('/list-users','UserController@getUsers')->name('api.users');
    Route::resource('/users', 'UserController',['except'=>['create','show']]);

    //Route: account
    Route::get('/list-accounts','AccountController@getUsers')->name('api.accounts');
    Route::resource('/accounts', 'AccountController',['except'=>['create','show']]);

    //Route: role
    Route::get('/list-roles','RoleController@getRoles')->name('api.roles');
    Route::resource('/roles', 'RoleController',['except'=>['create','show']]);

    //Route: post
    Route::get('/list-posts','PostController@getPosts')->name('api.posts');
    Route::resource('/posts', 'PostController',['except'=>['show']]);

});
