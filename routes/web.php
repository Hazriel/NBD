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
    'uses' => 'HomeController@index',
    'middleware' => 'account.state'
]);

Route::get('/account-not-activated', [
    'as'   => 'account-not-activated',
    'uses' => 'UserController@accountNotActivated'
]);

Route::get('/account-banned', [
    'as'   => 'account-banned',
    'uses' => 'UserController@accountBanned'
]);

Route::get('/confirm-account', [
    'as'   => 'confirm-account',
    'uses' => 'UserController@confirmAccount'
]);

Route::get('/resend-mail', [
    'as'   => 'resend-mail',
    'uses' => 'UserController@resendMailForm'
]);

Route::post('/resend-mail', [
    'as'   => 'resend-mail',
    'uses' => 'UserController@resendMail'
]);

Route::group(['prefix' => 'user/', 'middleware' => ['auth', 'account.state'], 'as' => 'user.'], function () {

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

Route::group(['prefix' => 'forum/', 'as' => 'forum.', 'middleware' => ['auth', 'account.state']], function () {

    Route::get('/', [
        'as'   => 'categories',
        'uses' => 'Forum\CategoryController@categories'
    ]);

    Route::get('{forum}', [
        'as'   => 'view',
        'uses' => 'Forum\ForumController@posts',
        'middleware' => 'can:view,forum'
    ]);

    Route::get('new-topic/{forum}', [
        'as'   => 'newTopic',
        'uses' => 'Forum\TopicController@createForm',
    ]);

    Route::post('new-topic/{forum}', [
        'as'   => 'newTopic',
        'uses' => 'Forum\TopicController@create',
    ]);

    Route::group(['prefix' => 'topic/', 'as' => 'topic.'], function () {

        Route::get('{topic}', [
            'as'   => 'view',
            'uses' => 'Forum\TopicController@view',
        ]);

        Route::post('new-post/{topic}', [
            'as'   => 'newPost',
            'uses' => 'Forum\PostController@create',
        ]);

        Route::get('update/{topic}', [
            'as'   => 'update',
            'uses' => 'Forum\TopicController@updateForm',
            'middleware' => 'can:update,topic'
        ]);

        Route::post('update/{topic}', [
            'as'   => 'update',
            'uses' => 'Forum\TopicController@update',
            'middleware' => 'can:update,topic'
        ]);

        Route::get('warning/{topic}', [
            'as'   => 'deleteWarning',
            'uses' => 'Forum\TopicController@deleteWarning',
            'middleware' => 'can:delete,topic'
        ]);

        Route::get('delete/{topic}', [
            'as'   => 'delete',
            'uses' => 'Forum\TopicController@delete',
            'middleware' => 'can:delete,topic'
        ]);

    });

    Route::group(['prefix' => 'post/', 'as' => 'post.'], function () {

        Route::get('update/{post}', [
            'as'   => 'update',
            'uses' => 'Forum\PostController@updateForm',
            'middleware' => 'can:update,post'
        ]);

        Route::post('update/{post}', [
            'as'   => 'update',
            'uses' => 'Forum\PostController@update',
            'middleware' => 'can:update,post'
        ]);

        Route::get('warning/{post}', [
            'as'   => 'deleteWarning',
            'uses' => 'Forum\PostController@deleteWarning',
            'middleware' => 'can:delete,post'
        ]);

        Route::get('delete/{post}', [
            'as'   => 'delete',
            'uses' => 'Forum\PostController@delete',
            'middleware' => 'can:delete,post'
        ]);

    });

});

Route::group(['prefix' => 'admin/', 'middleware' => ['auth', 'can:admin-access', 'account.state'], 'as' => 'admin.'], function () {

    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'Admin\AdminController@dashboard'
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

        Route::post('add-role/{user}', [
            'as'   => 'addToRole',
            'uses' => 'Admin\UserController@addToRole',
            'middleware' => 'can:update,user'
        ])->where('user', '[0-9]+');

        Route::post('remove-role/{user}', [
            'as'   => 'removeFromRole',
            'uses' => 'Admin\UserController@removeFromRole',
            'middleware' => 'can:update,user'
        ]);

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

            Route::get('update/{forum}', [
                'as'   => 'update',
                'uses' => 'Forum\ForumController@updateForm'
            ]);

            Route::post('update/{forum}', [
                'as'   => 'update',
                'uses' => 'Forum\ForumController@update'
            ]);

            Route::get('warning/{forum}', [
                'as'   => 'warning',
                'uses' => 'Forum\ForumController@warning'
            ]);

            Route::get('archive/{forum}', [
                'as'   => 'archive',
                'uses' => 'Forum\ForumController@archive'
            ]);

        });

    });

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {

        Route::get('create/', [
            'as' => 'create',
            'uses' => 'NewsController@createForm'
        ]);

        Route::post('create/', [
            'as' => 'create',
            'uses' => 'NewsController@createNews'
        ]);

    });

});
