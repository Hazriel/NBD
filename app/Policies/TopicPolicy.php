<?php

namespace App\Policies;

use App\Topic;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Topic $topic) {
        return $topic->owner->id === $user->id
        || $user->hasPermissionPower('topic_update_power', $topic->forum->required_topic_update_power);
    }

    public function delete(User $user, Topic $topic) {
        return $user->hasPermissionPower('topic_delete_power', $topic->forum->required_topic_delete_power);
    }
}
