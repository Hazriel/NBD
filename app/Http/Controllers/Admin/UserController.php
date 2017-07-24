<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userList(Request $request, $page)
    {
        $firstIndex = ($page - 1) * 10;
        $lastIndex = $page * 10;
        $users = User::all()->sortByDesc('created_at')->slice($firstIndex, $lastIndex);
        return view('admin.user.list', compact('users'));
    }
}