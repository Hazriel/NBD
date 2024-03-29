<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'owner_id',
        'title',
        'content',
    ];

    public function owner() {
        return $this->belongsTo('App\User');
    }
}
