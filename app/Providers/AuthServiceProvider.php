<?php

namespace App\Providers;

use App\Forum;
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
            return $user->hasPermission('admin.access') || $user->hasRole('admin');
        });

        Gate::define('topic.create', function (User $user, Forum $forum) {
            Log::debug("Required create power : " . $forum);
            return $forum->required_topic_create_power == 0
                || $this->hasPermission($user, 'topic_create_power', $forum->required_topic_create_power);
        });

        Gate::define('topic.update', function (User $user, $required_power) {
            Log::debug("Required update power : " . $required_power);
            return $this->hasPermission($user, 'topic_update_power', $required_power);
        });

        Gate::define('topic.delete', function (User $user, $required_power) {
            Log::debug("Required delete power : " . $required_power);
            return $this->hasPermission($user, 'topic_delete_power', $required_power);
        });

        Gate::define('post.create', function (User $user, Topic $topic) {
            Log::debug("Required create power : " . $topic->forum->required_post_create_power);
            return $this->hasPermission($user, 'post_create_power', $topic->forum->required_post_create_power);
        });

        Gate::define('post.update', function (User $user, $required_power) {
            Log::debug("Required update power : " . $required_power);
            return $this->hasPermission($user, 'post_update_power', $required_power);
        });

        Gate::define('post.delete', function (User $user, $required_power) {
            Log::debug("Required delete power : " . $required_power);
            return $this->hasPermission($user, 'post_delete_power', $required_power);
        });
    }

    private function hasPermission($user, $permission, $required_power) {
        return $user->hasRole('admin') || $user->hasPermissionPower($permission, $required_power);
    }
}