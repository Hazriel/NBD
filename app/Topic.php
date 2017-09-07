<?php

/*
 * Forum post
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Topic extends Model
{
    public $fillable = ['title', 'owner_id', 'last_post_id', 'forum_id', 'post_count'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function forum()
    {
        return $this->belongsTo('App\Forum');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function lastPost()
    {
        return $this->posts()->orderByDesc('created_at')->first();
    }
}
