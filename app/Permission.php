<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'required_power'];

    public function permissionPowers()
    {
        return $this->hasMany('App\RolePermissionPower');
    }
}
