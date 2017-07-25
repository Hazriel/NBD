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

Route::group(['prefix' => 'admin/', 'middleware' => ['auth', 'can:admin-access'], 'as' => 'admin.', 'permissions' => 'admin.access'], function () {

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
        ])->where('page', '[0-9]+');

        Route::get('update/{user}', [
            'as'   => 'update',
            'uses' => 'Admin\UserController@updateForm'
        ])->where('user', '[0-9]+');

        Route::post('update/{user}', [
            'as'   => 'update',
            'uses' => 'Admin\UserController@update'
        ])->where('user', '[0-9]+');

        Route::post('role/{user}', [
            'as'   => 'addToRole',
            'uses' => 'Admin\UserController@addToRole'
        ])->where('user', '[0-9]+');

    });

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {

        Route::get('create', [
            'as'   => 'create',
            'uses' => 'Admin\RoleController@createRoleForm',
            'middleware' => 'can:create,App\Role'
        ]);

        Route::post('create', [
            'as'   => 'create',
            'uses' => 'Admin\RoleController@create',
            'middleware' => 'can:create,App\Role'
        ]);

        Route::get('update/{role}', [
            'as'   => 'update',
            'uses' => 'Admin\RoleController@updateRoleForm',
            'middleware' => 'can:update,role'
        ])->where('role', '[0-9]+');

        Route::post('update/{role}', [
            'as'   => 'update',
            'uses' => 'Admin\RoleController@update',
            'middleware' => 'can:update,role'
        ])->where('role', '[0-9]+');

        Route::get('delete/{role}', [
            'as'   => 'delete',
            'uses' => 'Admin\RoleController@delete',
            'middleware' => 'can:delete,role'
        ])->where('role', '[0-9]+');

    });

});
