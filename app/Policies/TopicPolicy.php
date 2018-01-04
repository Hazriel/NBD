<?php

namespace App\Policies;

use App\Topic;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Topic $topic) {
        // FIXME
        return true;
    }

    public function delete(User $user, Topic $topic) {
        // FIXME
        return true;
    }
}
