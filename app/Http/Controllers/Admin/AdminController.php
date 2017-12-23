<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Forum;
use App\Http\Controllers\Controller;
use App\News;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Admin";

        $roles = Role::all();
        $forum_categories = Category::all()->sortBy('display_order');

        // 10 users per page
        $userPageCount = User::all()->count() / config('app.ADMIN_USER_PER_PAGE') + 1;
        $users = User::all()->sortByDesc('created_at')->take(config('app.ADMIN_USER_PER_PAGE'));


        $newsPageCount = News::all()->count() / config('app.ADMIN_NEWS_PER_PAGE') + 1;
        $newsList = News::all()->sortByDesc('created_at')->take(config('app.ADMIN_NEWS_PER_PAGE'));

        return view('admin.dashboard', compact('pageTitle',
            'roles',
            'users',
            'userPageCount',
            'forum_categories',
            'newsList',
            'newsPageCount'));
    }

}
