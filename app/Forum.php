<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    public function archive()
    {
        Log::info('Archiving forum ' . $this->title . ' ...');
        $archivesCategory = Category::where('title', 'Archives')->get()->first();

        if (is_null($archivesCategory)) {
            // The category doesn't exist, create it
            $archivesCategory = Category::create([
                'title' => 'Archives',
                'required_view_power' => '100',
                'required_modify_power' => '100',
                'required_delete_power' => '100',
                'display_order' => '1000',
            ]);
        }

        $this->update([
            'category_id' => $archivesCategory->id
        ]);
    }
}
