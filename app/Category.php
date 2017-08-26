<?php

/*
 * Forum category
 */

namespace App;

use App\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    public $timestamps = false;
    public $fillable = ['title', 'required_view_power', 'required_update_power', 'required_delete_power', 'display_order'];

    public function forums()
    {
        return $this->hasMany('App\Forum');
    }

    public function archiveForums()
    {
        Log::info('Archiving Category ' . $this->title . ' ...');
        foreach ($this->forums as $forum)
            $forum->archive();
    }
}
