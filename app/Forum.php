<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public $timestamps = false;
    public $fillable = [
        'title',
        'description',
        'required_view_power',
        'required_create_post_power',
        'required_modify_post_power',
        'required_delete_post_power',
        'required_create_comment_power',
        'required_modify_comment_power',
        'required_delete_comment_power',
        'display_order',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
