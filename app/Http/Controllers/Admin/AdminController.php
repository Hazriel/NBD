<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Forum;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard";
        $roles = Role::all();

        // 10 users per page
        $users = User::all()->sortByDesc('created_at')->take(10);

        $forum_categories = Category::all()->sortBy('display_order');

        $pageCount = User::all()->count() / 10 + 1;
        return view('admin.dashboard', compact('pageTitle', 'roles', 'users', 'pageCount', 'forum_categories'));
    }

}
