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

// Authentication Routes - Auth::routes();
Route::namespace('Auth')->group(function () {
    Route::get('/', 'LoginController@showLoginForm');
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

// Authenticated application routes
Route::group(['middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/home', 'HomeController@index')->name('home');
    
    // Authenticated user
    Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {

        // Profile
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/edit', 'ProfileController@edit')->name('edit');
            Route::put('/', 'ProfileController@update')->name('update');
        });
    });

    // Routes that need permission
    Route::group(['middleware' => 'route-permission'], function () {

        // Application admin.
        Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
            
            // Users, roles and permissions.
            Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {

                // Users
                Route::get('/', 'UserController@index')->name('index');
                Route::get('/create', 'UserController@create')->name('create');
                Route::post('/', 'UserController@store')->name('store');
                Route::get('/{user}/edit', 'UserController@edit')->name('edit');
                Route::put('/{user}', 'UserController@update')->name('update');

                // Roles (user groups)
                Route::resource('role', 'RoleController', ['except' => ['show']]);
            });
        });
    });
});
