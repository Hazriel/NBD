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
        $requiredPower = $post->topic->forum->required_post_update_power;
        return $post->owner === $user || $user->hasPermissionPower($user, 'post_update_power', $requiredPower);
    }
}
