<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'birth_date', 'description', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addRole($roleId)
    {
        $this->roles()->attach($roleId);
    }

    public function removeRole($roleId)
    {
        $this->roles()->detach($roleId);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    public function hasPermission($slug)
    {
        // If the user is admin, grant permission
        if ($this->hasRole('admin'))
            return true;
        
        foreach ($this->roles as $role) {
            if ($role->hasPermission($slug))
                return true;
        }
        return false;
    }

    public function hasRole($slug)
    {
        foreach ($this->roles as $role) {
            if ($role->slug === $slug)
                return true;
        }
        return false;
    }

    public function hasPermissionPower($permission, $required) {
        if ($required == 0)
            return true;
        // If the user is admin, grant permission
        if ($this->hasRole('admin'))
            return true;

        foreach ($this->roles as $role) {
            Log::info($role->powers());
            if ($role->powers()[$permission] >= $required)
                return true;
        }
        return false;
    }

    public function canUpdatePost(Post $post) {
        return $this->id === $post->owner->id
            || $this->hasPermissionPower('post_update_power', $post->topic->forum->required_post_update_power);
    }

    public function canDeletePost(Post $post) {
        return $this->hasPermissionPower('post_delete_power', $post->topic->forum->required_post_delete_power);
    }

    public function toSearchableArray()
    {
        return array($this->username, $this->email);
    }

    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
