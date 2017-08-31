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
        'required_create_topic_power',
        'required_update_topic_power',
        'required_delete_topic_power',
        'required_create_post_power',
        'required_update_post_power',
        'required_delete_post_power',
        'display_order',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function posts()
    {
        return $this->hasMany('App\Topic');
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
                'required_update_power' => '100',
                'required_delete_power' => '100',
                'display_order' => '1000',
            ]);
        }

        $this->update([
            'category_id' => $archivesCategory->id
        ]);
    }
}
