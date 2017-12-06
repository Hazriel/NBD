<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'owner_id',
        'title',
        'content',
        'archived'
    ];

    public function owner() {
        return $this->belongsTo('App\User');
    }
}
