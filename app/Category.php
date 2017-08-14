<?php

/*
 * Forum category
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public $fillable = ['title', 'required_view_power', 'required_modify_power', 'required_delete_power', 'display_order'];

    public function forums()
    {
        return $this->belongsToMany('App\Forum');
    }

    public function addForum(array $data)
    {

    }
}
