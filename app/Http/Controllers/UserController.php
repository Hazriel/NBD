<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('user.profile', compact('user'));
    }

    public function updateForm($user)
    {
        return view('user.update', compact('user'));
    }

    public function accountNotActivated() {
        return view('user.account-not-activated');
    }

    public function accountBanned() {
        return view('user.account-banned');
    }
}
