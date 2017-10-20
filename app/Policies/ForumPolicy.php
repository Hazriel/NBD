<?php

namespace App\Policies;

use App\User;
use App\Forum;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function view(User $user, Forum $forum)
    {
        return $user->hasPermissionPower('forum_view_power', $forum->required_view_power) || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create forums.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('forum.create') || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function update(User $user, Forum $forum)
    {
        return $user->hasPermission('forum.update') || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the forum.
     *
     * @param  \App\User  $user
     * @param  \App\Forum  $forum
     * @return mixed
     */
    public function delete(User $user, Forum $forum)
    {
        return $user->hasPermission('forum.delete') || $user->hasRole('admin');
    }
}
