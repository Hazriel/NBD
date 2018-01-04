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
        // FIXME
        return true;
    }

    public function delete(User $user, Post $post) {
        // FIXME
        return true;
    }
}
