<?php

namespace App\Providers;

use App\Forum;
use App\Policies\PostPolicy;
use App\Post;
use App\Topic;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Role'  => 'App\Policies\RolePolicy',
        'App\User'  => 'App\Policies\UserPolicy',
        'App\Category' => 'App\Policies\CategoryPolicy',
        'App\Forum'    => 'App\Policies\ForumPolicy',
        'App\Topic'    => 'App\Policies\TopicPolicy',
        'App\Post'     => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->customPolicies();
    }

    private function customPolicies()
    {
        Gate::define('admin-access', function (User $user) {
            // FIXME
            return true;
        });
    }
}