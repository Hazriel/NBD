<?php

namespace App\Policies;

use App\Forum;
use App\User;
use App\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create topics.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Forum $forum)
    {
        return $user->hasPermissionPower('create_topic_power', $forum->required_create_topic_power);
    }

    /**
     * Determine whether the user can update the topic.
     *
     * @param  \App\User  $user
     * @param  \App\Topic  $topic
     * @return mixed
     */
    public function update(User $user, Topic $topic)
    {
        return $user->hasPermissionPower('update_topic_power', $topic->forum->required_update_topic_power) || $topic->owner->id == $user->id;
    }

    /**
     * Determine whether the user can delete the topic.
     *
     * @param  \App\User  $user
     * @param  \App\Topic  $topic
     * @return mixed
     */
    public function delete(User $user, Topic $topic)
    {
        return $user->hasPermissionPower('delete_topic_power', $topic->forum->required_update_topic_power) || $topic->owner->id == $user->id;
    }
}
