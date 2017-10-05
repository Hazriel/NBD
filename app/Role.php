<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_view_power',
        'forum_view_power',
        'topic_create_power',
        'topic_update_power',
        'topic_delete_power',
        'post_create_power',
        'post_update_power',
        'post_delete_power',
    ];

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
