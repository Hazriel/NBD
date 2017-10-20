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

    public function powers() {
        return [
            'category_view_power' => $this->category_view_power,
            'forum_view_power' => $this->forum_view_power,
            'topic_create_power' => $this->topic_create_power,
            'topic_update_power' => $this->topic_update_power,
            'topic_delete_power' => $this->topic_delete_power,
            'post_create_power' => $this->post_create_power,
            'post_update_power' => $this->post_update_power,
            'post_delete_power' => $this->post_delete_power
        ];
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_role');
    }
}
