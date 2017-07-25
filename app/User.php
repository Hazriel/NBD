<?php

namespace App;

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
        'username', 'email', 'password', 'birth_date'
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
        DB::table('role_user')->insert([
            'role_id' => $roleId,
            'user_id' => $this->id
        ]);
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
}
