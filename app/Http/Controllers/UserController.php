<?php

namespace App\Http\Controllers;

use App\AccountConfirmationLink;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function confirmAccount(Request $request) {
        $queryString = $request->query();

        if ($queryString != null && $queryString[config('app.VALIDATE_ACCOUNT_TOKEN_FIELD_NAME')] != null) {
            $token = $queryString[config('app.VALIDATE_ACCOUNT_TOKEN_FIELD_NAME')];
            $link = AccountConfirmationLink::where('token', $token)->first();

            if ($link != null) {
                $link->validateAccount();
                return view('user.account-activated');
            }
        }
        return view('errors.403');
    }

    public function resendMailForm() {
        // If the user is already connected, redirect
        if (Auth::check())
            return redirect()->route('home');
        return view('user.resend-mail');
    }

    public function resendMail(Request $request) {

    }
}
