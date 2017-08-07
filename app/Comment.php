<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
