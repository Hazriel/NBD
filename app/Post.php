<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'owner_id'];

    public function post()
    {
        return $this->belongsTo('App\Topic');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
