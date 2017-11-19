<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Forum extends Model
{
    public $timestamps = false;
    public $fillable = [
        'title',
        'description',
        'last_post_id',
        'required_view_power',
        'required_topic_create_power',
        'required_topic_update_power',
        'required_topic_delete_power',
        'required_post_create_power',
        'required_post_update_power',
        'required_post_delete_power',
        'display_order',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function topics()
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

    public function lastPostId() {
        $lastPost = DB::table('forums')
            ->where('forums.id', '=', $this->id)
            ->join('topics', 'topics.forum_id', '=', 'forums.id')
            ->join('posts', 'posts.topic_id', '=', 'topics.id')
            ->select('posts.id')
            ->orderByDesc('posts.created_at')
            ->get();

        if ($lastPost->count() == 0)
            return null;
        return $lastPost[0]->id;
    }
}
