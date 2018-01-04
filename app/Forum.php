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

    /**
     * Returns the last post in the forum or null if there are no posts.
     */
    public function lastPost() {
        $lastPosts = DB::table('forums')
            ->where('forums.id', '=', $this->id)
            ->join('topics', 'topics.forum_id', '=', 'forums.id')
            ->join('posts', 'posts.topic_id', '=', 'topics.id')
            ->select('posts.id')
            ->orderByDesc('posts.created_at')
            ->get();

        if ($lastPosts->count() == 0)
            return null;
        return $lastPosts[0];
    }

    public function getPosts() {
        $posts = array();
        foreach ($this->topics as $topic) {
            $posts->append($topic->posts);
        }
        return $posts;
    }
}
