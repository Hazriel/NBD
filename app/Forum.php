<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public $timestamps = false;
    public $fillable = ['name', 'description', 'restricted'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
