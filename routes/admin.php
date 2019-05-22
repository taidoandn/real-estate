<?php

Route:: get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
Route:: post('/login', 'AdminLoginController@login')->name('admin.login.submit');
Route:: get('/logout', 'AdminLoginController@logout')->name('admin.logout');

Route:: get('/mark-as-read', 'NotificationController@markAsRead')->name('admin.mark-as-read');

Route::group(['as' => 'admin.','middleware'=>'auth:admin'], function () {
    Route:: get('/', 'AdminController@index')->name('dashboard');

    //Route: user
    Route::get('/list-users','UserController@getUsers')->name('api.users')->middleware("can:isSuperAdmin");
    Route::resource('/users', 'UserController',['except'=>['create','show']])->middleware("can:isSuperAdmin");

    //Route: account
    Route::get('/list-accounts','AccountController@getUsers')->name('api.accounts');
    Route::resource('/accounts', 'AccountController',['except'=>['create','show']]);

    //Route: role
    Route::get('/list-roles','RoleController@getRoles')->name('api.roles')->middleware("can:isSuperAdmin");
    Route::resource('/roles', 'RoleController',['except'=>['create','show']])->middleware("can:isSuperAdmin");

    //Route: post
    Route::get('/list-posts','PostController@getPosts')->name('api.posts');
    Route::resource('/posts', 'PostController',['except'=>['show']]);

    // Route: city
    Route::get('/list-cities','CityController@getCities')->name('api.cities');
    Route::resource('/cities', 'CityController',['except'=>['show']]);

    // Route: district
    Route::get('/list-districts','DistrictController@getDistricts')->name('api.districts');
    Route::resource('/districts', 'DistrictController',['except'=>['show']]);

    //Route: property-types
    Route::get('/list-property-types','PropertyTypeController@getPropertyTypes')->name('api.property-types');
    Route::resource('/property-types', 'PropertyTypeController',['except'=>['show']]);

    //Route: conveniences
    Route::get('/list-conveniences','ConvenienceController@getConveniences')->name('api.conveniences');
    Route::resource('/conveniences', 'ConvenienceController',['except'=>['show']]);
    //Route: distances
    Route::get('/list-distances','DistanceController@getDistances')->name('api.distances');
    Route::resource('/distances', 'DistanceController',['except'=>['show']]);

    //Route: distances
    Route::get('/list-post-types','PostTypeController@getPostTypes')->name('api.post-types');
    Route::resource('/post-types', 'PostTypeController',['except'=>['show']]);

    //Route: distances
    Route::get('/list-blogs','BlogController@getBlogs')->name('api.blogs');
    Route::resource('/blogs', 'BlogController',['except'=>['show']]);

    //Route: reports
    Route::get('/list-reports','ReportController@getReports')->name('api.reports');
    Route::resource('/reports', 'ReportController',['only'=>['show','index','destroy']]);
    //Route: contacts
    Route::get('/list-contacts','ContactController@getContacts')->name('api.contacts');
    Route::resource('/contacts', 'ContactController',['only'=>['show','index','destroy']]);

});
