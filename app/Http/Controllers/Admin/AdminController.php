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

        // 10 users per page
        $users = User::all()->sortByDesc('created_at')->take(config('app.ADMIN_USER_PER_PAGE', 10));

        $forum_categories = Category::all()->sortBy('display_order');

        $newsList = News::all()->sortByDesc('created_at')->take(config('app.ADMIN_NEWS_PER_PAGE', 5));

        $pageCount = User::all()->count() / 10 + 1;
        return view('admin.dashboard', compact('pageTitle',
            'roles',
            'users',
            'pageCount',
            'forum_categories',
            'newsList'));
    }

}
