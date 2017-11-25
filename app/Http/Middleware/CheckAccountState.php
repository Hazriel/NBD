<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CheckAccountState
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('checkAccountState');
        // If the user is not authenticated ignore

        $user = auth()->user();
        if ($user != null) {
            $email = $user->email;
            Log::info($email);
            if ($user->banned) {
                auth()->logout();
                return redirect('account-banned');
            }
            if (!$user->activated) {
                auth()->logout();
                return redirect()->action('UserController@accountNotActivated');
            }
        }

        return $next($request);
    }
}
