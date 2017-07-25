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
        'uses' => 'Admin\AdminController@dashboard'
    ]);

    Route::get('/permissiongenerate', [
        'as'   => 'permissionGenerate',
        'uses' => 'Admin\AdminController@generatePermissionSet'
    ]);

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

        Route::get('list/{page}', [
            'as'   => 'list',
            'uses' => 'Admin\UserController@userList'
        ]);

        Route::get('update/{user}', [
            'as'   => 'update',
            'uses' => 'Admin\UserController@updateForm'
        ]);

        Route::post('update/{user}', [
            'as'   => 'update',
            'uses' => 'Admin\UserController@update'
        ]);

    });

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {

        Route::get('create', [
            'as'   => 'create',
            'uses' => 'Admin\RoleController@createRoleForm'
        ]);

        Route::post('create', [
            'as'   => 'create',
            'uses' => 'Admin\RoleController@create'
        ]);

        Route::get('update/{role}', [
            'as'   => 'update',
            'uses' => 'Admin\RoleController@updateRoleForm'
        ]);

        Route::post('update/{role}', [
            'as'   => 'update',
            'uses' => 'Admin\RoleController@update'
        ]);

        Route::get('delete/{role}', [
            'as'   => 'delete',
            'uses' => 'Admin\RoleController@delete'
        ]);

    });

});
