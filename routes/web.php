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

Route::get('/blyat', [
    'uses' => 'Admin\AdminController@generatePermissionSet'
]);

Route::group(['prefix' => 'user/', 'middleware' => ['auth'], 'as' => 'user.'], function () {

    Route::get('{user}', [
        'as'   => 'profile',
        'uses' => 'UserController@profile'
    ]);

    Route::get('update/{user}', [
        'as'   => 'update',
        'uses' => 'UserController@updateForm'
    ]);

    Route::post('update/{user}', [
        'as'   => 'update',
        'uses' => 'Admin\UserController@update'
    ]);

});

Route::group(['prefix' => 'admin/', 'middleware' => ['auth', 'can:admin-access'], 'as' => 'admin.'], function () {

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
            'uses' => 'Admin\UserController@updateForm',
            'middleware' => 'can:update,user'
        ])->where('user', '[0-9]+');

        Route::post('update/{user}', [
            'as'   => 'update',
            'uses' => 'Admin\UserController@update',
            'middleware' => 'can:update,user'
        ])->where('user', '[0-9]+');

        Route::post('role/{user}', [
            'as'   => 'addToRole',
            'uses' => 'Admin\UserController@addToRole',
            'middleware' => 'can:update,user'
        ])->where('user', '[0-9]+');

        Route::post('search', [
            'as'   => 'search',
            'uses' => 'Admin\UserController@searchUser'
        ]);

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

    Route::group(['prefix' => 'forum', 'as' => 'forum.'], function () {

        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {

            Route::get('create', [
                'as'   => 'create',
                'uses' => 'Forum\CategoryController@createForm'
            ]);

            Route::post('create', [
                'as'   => 'create',
                'uses' => 'Forum\CategoryController@create'
            ]);

            Route::get('update/{category}', [
                'as'   => 'update',
                'uses' => 'Forum\CategoryController@updateForm'
            ]);

            Route::post('update/{category}', [
                'as'   => 'update',
                'uses' => 'Forum\CategoryController@update'
            ]);

            Route::get('warning/{category}', [
                'as'   => 'warning',
                'uses' => 'Forum\CategoryController@deleteWarning'
            ]);

            Route::get('delete/{category}', [
                'as'   => 'delete',
                'uses' => 'Forum\CategoryController@delete'
            ]);

        });

        Route::group(['prefix' => 'forum', 'as' => 'forum.'], function () {

            Route::get('create/{category}', [
                'as'   => 'create',
                'uses' => 'Forum\ForumController@createForm'
            ]);

            Route::post('create/{category}', [
                'as'   => 'create',
                'uses' => 'Forum\ForumController@create'
            ]);

        });

    });

});
