<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermissionPower extends Model
{
    public $timestamps = false;
    protected $fillable = ['power'];

    public function permission()
    {
        return $this->hasOne('App\Permission');
    }

    public function role()
    {
        return $this->hasOne('App\Role');
    }
}
