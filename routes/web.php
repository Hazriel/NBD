<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a role which
| contains the "web" middleware role. Now create something great!
|
*/

Auth::routes();

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

Route::group(['prefix' => 'admin/', 'middleware' => 'auth', 'as' => 'admin.'], function () {

    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'AdminController@dashboard'
    ]);

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {

        Route::get('create', [
            'as'   => 'create',
            'uses' => 'AdminController@createRoleForm'
        ]);

        Route::post('create', [
            'as'   => 'create',
            'uses' => 'AdminController@create'
        ]);

    });

});
