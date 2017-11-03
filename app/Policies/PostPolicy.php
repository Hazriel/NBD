<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post) {
        return $post->owner->id === $user->id
            || $user->hasPermissionPower($user,
                'post_update_power',
                $post->topic->forum->required_update_post_power);
    }

    public function delete(User $user, Post $post) {
        return $post->owner->id === $user->id
            || $user->hasPermissionPower($user,
                'post_update_power',
                $post->topic->forum->required_delete_post_power);
    }
}
