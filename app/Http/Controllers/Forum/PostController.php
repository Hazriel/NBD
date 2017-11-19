<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function create(Request $request, Topic $topic)
    {
        // Check user permission
        if ($request->user() == null
            || !$request->user()->hasPermissionPower('post_create_power', $topic->forum->required_post_create_power))
            abort(403, 'Unauthorized action.');

        $this->validate($request, [
            'message' => 'required'
        ]);

        $input = $request->all();
        $user = Auth::user();

        DB::beginTransaction();

            $post = Post::create([
                'message'  => $input['message'],
                'owner_id' => $user->id,
                'topic_id' => $topic->id
            ]);

            $topic->update([
                'last_post_id' => $post->id,
                'post_count'   => $topic->post_count + 1
            ]);

            $topic->forum->update([
                'last_post_id' => $post->id
            ]);

        DB::commit();

        return redirect()->route('forum.topic.view', $topic->id)->withSuccess('Your post was added.');
    }

    public function updateForm(Request $request, Post $post) {
        if (!$request->user()->canUpdatePost($post))
            abort(403, "Cannot update this post");

        $topic = $post->topic;

        // Get the first post of the topic and compare it to the one passed as parameter
        $firstPost = Post::where('topic_id', $topic->id)->orderBy('created_at')->first();
        if ($firstPost->id === $post->id)
            return redirect()->route('forum.topic.update', $topic);

        return view('forum.post.update', compact('post'));
    }

    public function update(Request $request, Post $post) {
        if (!$request->user()->canUpdatePost($post))
            abort(403, "Cannot update this post");

        $this->validate($request, [
            'message' => 'required'
        ]);

        $input = $request->all();
        $post->update([
            'message' => $input['message']
        ]);

        return redirect()->route('forum.topic.view', $post->topic)->withSuccess('Post was updated successfully.');
    }

    public function deleteWarning(Request $request, Post $post) {
        // First determine if the post is the topic's first post
        $topic = $post->topic;
        $firstPost = Post::where('topic_id', $topic->id)->orderBy('created_at')->first();
        if ($firstPost->id === $post->id) {
            return redirect()->route('forum.topic.deleteWarning', $post->topic);
        }

        $confirmation = 'Do you really want to delete this post ?';
        $next = route('forum.post.delete', $post->id);
        $redirectTo = route('forum.topic.view', $post->topic);
        return view('misc.confirmation', compact('confirmation', 'next', 'redirectTo'));
    }

    public function delete(Request $request, Post $post) {
        $topic = $post->topic;
        $forum = $topic->forum;
        $postId = $post->id;
        $post->delete();
        // Update the topic's last post
        if ($topic->last_post_id == $postId) {
            $topic->update([
                'last_post_id' => $topic->lastPost()->id
            ]);
        }

        // Update the forum's last post if the id matches the deleted one
        if ($forum->last_post_id == $postId) {
            $forum->update([
                'last_post_id' => $forum->lastPostId()
            ]);
        }

        return redirect()->route('forum.topic.view', $topic)->withSuccess('The post was successfully deleted.');
    }
}
