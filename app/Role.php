<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }

    public function hasPermission($permSlug)
    {
        $permission = Permission::where('slug', $permSlug)->first();
        return $this->permissions()->get()->contains($permission);
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_role');
    }
}
