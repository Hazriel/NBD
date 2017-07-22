<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    protected $fillable = ['slug', 'description'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
