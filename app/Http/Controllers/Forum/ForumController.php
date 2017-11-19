<?php

namespace App\Http\Controllers\Forum;

use App\Category;
use App\Forum;
use App\Http\Controllers\Controller;
use App\Topic;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function posts(Request $request, Forum $forum)
    {
        $topics = Topic::where('forum_id', $forum->id)->orderByDesc('updated_at')->paginate(20);
        return view('forum.forum', compact('forum', 'topics'));
    }

    public function createForm(Request $request, Category $category)
    {
        return view('admin.forum.forum.create', compact('category'));
    }

    public function create(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|string|max:30|min:3',
            'description' => 'string|nullable',
            'required_view_power' => 'required|int|min:0',
            'required_topic_create_power' => 'required|int|min:0',
            'required_topic_update_power' => 'required|int|min:0',
            'required_topic_delete_power' => 'required|int|min:0',
            'required_post_create_power' => 'required|int|min:0',
            'required_post_update_power' => 'required|int|min:0',
            'required_post_delete_power' => 'required|int|min:0',
            'display_order' => 'required',
        ]);

        $input = $request->all();
        Forum::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'required_view_power' => $input['required_view_power'],
            'required_topic_create_power' => $input['required_topic_create_power'],
            'required_topic_update_power' => $input['required_topic_update_power'],
            'required_topic_delete_power' => $input['required_topic_delete_power'],
            'required_post_create_power' => $input['required_post_create_power'],
            'required_post_update_power' => $input['required_post_update_power'],
            'required_post_delete_power' => $input['required_post_delete_power'],
            'display_order' => $input['display_order'],
            'category_id' => $category->id,
        ]);

        return redirect()->route('admin.dashboard')->withSuccess('The forum ' . $input['title'] . ' was successfully created.');
    }

    public function updateForm(Request $request, Forum $forum)
    {
        return view('admin.forum.forum.update', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
    {
        $this->validate($request, [
            'title' => 'required|string|max:30|min:3',
            'description' => 'string|nullable',
            'required_view_power' => 'required|int|min:0',
            'required_topic_create_power' => 'required|int|min:0',
            'required_topic_update_power' => 'required|int|min:0',
            'required_topic_delete_power' => 'required|int|min:0',
            'required_post_create_power' => 'required|int|min:0',
            'required_post_update_power' => 'required|int|min:0',
            'required_post_delete_power' => 'required|int|min:0',
            'display_order' => 'required',
        ]);

        $input = $request->all();
        $forum->update([
            'title' => $input['title'],
            'description' => $input['description'],
            'required_view_power' => $input['required_view_power'],
            'required_topic_create_power' => $input['required_topic_create_power'],
            'required_topic_update_power' => $input['required_topic_update_power'],
            'required_topic_delete_power' => $input['required_topic_delete_power'],
            'required_post_create_power' => $input['required_post_create_power'],
            'required_post_update_power' => $input['required_post_update_power'],
            'required_post_delete_power' => $input['required_post_delete_power'],
            'display_order' => $input['display_order'],
        ]);

        return redirect()->route('admin.dashboard')->withSuccess('The forum ' . $input['title'] . ' was successfully updated.');
    }

    public function warning(Request $request, Forum $forum)
    {
        $message = "The forum will be archived before to be deleted.";
        $confirmation = "Are you sure you want to delete the " . $forum->title . " forum ?";
        $next = route('admin.forum.forum.archive', $forum);
        $redirectTo = route('admin.dashboard');
        return view('misc.confirmation', compact('message', 'confirmation', 'next', 'redirectTo'));
    }

    public function archive(Request $request, Forum $forum)
    {
        // Doesn't really delete, but put it to the archives category
        $forum->archive();
        return redirect()->route('admin.dashboard')->withSuccess('The forum ' . $forum->title . ' was successfully deleted.');
    }
}
