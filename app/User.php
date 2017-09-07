<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

    public function toSearchableArray()
    {
        return array($this->username, $this->email);
    }

    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
