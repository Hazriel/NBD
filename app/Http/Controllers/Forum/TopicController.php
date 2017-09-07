<?php

namespace App\Http\Controllers\Forum;

use App\Forum;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function createForm(Request $request, Forum $forum)
    {
       return view('forum.topic.create', compact('forum'));
    }

    public function create(Request $request, Forum $forum)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'message' => 'required|string'
        ]);

        $input = $request->all();

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

        return redirect()->route('forum.view', $forum->id)->withSuccess('Topic was created successfully.');
    }
}
