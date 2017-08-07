<?php

/*
 * Forum category
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public $fillable = ['name'];

    public function forums()
    {
        return $this->belongsToMany('App\Forum');
    }
}
