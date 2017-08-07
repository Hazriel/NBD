<?php

/*
 * Forum post
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany('App\Role');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
