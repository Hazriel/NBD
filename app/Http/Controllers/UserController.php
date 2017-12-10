<?php

namespace App\Http\Controllers;

use App\AccountConfirmationLink;
use App\Mail\ConfirmationLink;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

    public function accountNotActivated()
    {
        return view('user.account-not-activated');
    }

    public function accountBanned()
    {
        return view('user.account-banned');
    }

    public function confirmAccount(Request $request)
    {
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

    public function resendMailForm()
    {
        // If the user is already connected, redirect
        if (Auth::check())
            return redirect()->route('home');
        return view('user.resend-mail');
    }

    public function resendMail(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'email' => 'required|string|email'
        ]);

        if (Auth::check())
            return redirect()->route('home')->withErrors('You are already connected to an account');

        $input = $request->all();

        $user = User::where('username', $input['username'])->first();

        if ($user == null)
            return redirect()->route('home')->withErrors('There is no user with that name.');

        if ($user->activated)
            return redirect()->route('home')->withErrors('This account is already activated.');

        if ($user->email !== $input['email'])
            return redirect()->route('home')->withErrors('The username and the email don\'t match.');

        // Everything is correct, proceed
        // If there is already a token in the database, delete it
        $existingLink = AccountConfirmationLink::where('user_id', $user->id)->first();
        if ($existingLink != null)
            $existingLink->delete();

        Mail::to($user)->send(new ConfirmationLink($user));

        return redirect()->route('home')->withSuccess('A new mail has been sent to ' . $input['email']);
    }
}
