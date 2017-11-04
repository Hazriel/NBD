<?php

namespace App\Http\Controllers\Forum;

use App\Forum;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function view(Request $request, Topic $topic)
    {
        if ($request->user() == null
            || !$request->user()->hasPermissionPower('post_create_power', $topic->forum->required_post_create_power))
            abort(403, 'Unauthorized action.');

        $posts = Post::where('topic_id', $topic->id)->paginate(10);
        return view('forum.topic.view', compact('posts', 'topic'));
    }

    public function createForm(Request $request, Forum $forum)
    {
        // Check if the user has permission
        if ($request->user() == null
            || !$request->user()->hasPermissionPower('topic_create_power', $forum->required_topic_create_power))
            abort(403, 'Unauthorized action.');

        return view('forum.topic.create', compact('forum'));
    }

    public function create(Request $request, Forum $forum)
    {
        if ($request->user() == null
            || !$request->user()->hasPermissionPower('topic_create_power', $forum->required_topic_create_power))
            abort(403, 'Unauthorized action.');

        $this->validate($request, [
            'title' => 'required|string|max:100',
            'message' => 'required|string'
        ]);

        $input = $request->all();

        DB::beginTransaction();

        $topic = Topic::create([
            'title' => $input['title'],
            'owner_id' => $request->user()->id,
            'forum_id' => $forum->id,
            'post_count' => 1
        ]);

        $post = Post::create([
            'message' => $input['message'],
            'owner_id' => $request->user()->id,
            'topic_id' => $topic->id
        ]);

        $topic->update([
            'last_post_id' => $post->id
        ]);

        $forum->update([
            'last_post_id' => $post->id
        ]);

        DB::commit();

        return redirect()->route('forum.view', $forum->id)->withSuccess('Topic was created successfully.');
    }

    public function updateForm(Topic $topic) {
        // Get the first post of the topic to pass it's content to the view
        $firstPost = Post::where('topic_id', $topic->id)->orderBy('created_at')->first();
        return view('forum.topic.update', compact('topic', 'firstPost'));
    }

    public function update(Request $request, Topic $topic) {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'message' => 'required|string'
        ]);

        $input = $request->all();

        $topic->update([
            'title' => $input['title'],
        ]);

        // Get the first post in the topic and update it aswell
        $firstPost = Post::where('topic_id', $topic->id)->orderBy('created_at')->first();
        if ($firstPost != null) {
            $firstPost->update([
                'message' => $input['message']
            ]);
        }
        return redirect()->route('forum.topic.view', $topic)->withSuccess('Topic was updated successfully.');
    }
}
