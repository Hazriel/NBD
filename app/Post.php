<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['message', 'owner_id', 'topic_id'];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
