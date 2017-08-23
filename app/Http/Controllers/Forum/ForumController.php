<?php

namespace App\Http\Controllers\Forum;

use App\Category;
use App\Forum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
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
            'required_create_post_power' => 'required|int|min:0',
            'required_modify_post_power' => 'required|int|min:0',
            'required_delete_post_power' => 'required|int|min:0',
            'required_create_comment_power' => 'required|int|min:0',
            'required_modify_comment_power' => 'required|int|min:0',
            'required_delete_comment_power' => 'required|int|min:0',
            'display_order' => 'required',
        ]);

        $input = $request->all();
        Forum::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'required_view_power' => $input['required_view_power'],
            'required_create_post_power' => $input['required_create_post_power'],
            'required_modify_post_power' => $input['required_modify_post_power'],
            'required_delete_post_power' => $input['required_delete_post_power'],
            'required_create_comment_power' => $input['required_create_comment_power'],
            'required_modify_comment_power' => $input['required_modify_comment_power'],
            'required_delete_comment_power' => $input['required_delete_comment_power'],
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
            'required_create_post_power' => 'required|int|min:0',
            'required_modify_post_power' => 'required|int|min:0',
            'required_delete_post_power' => 'required|int|min:0',
            'required_create_comment_power' => 'required|int|min:0',
            'required_modify_comment_power' => 'required|int|min:0',
            'required_delete_comment_power' => 'required|int|min:0',
            'display_order' => 'required',
        ]);

        $input = $request->all();
        $forum->update([
            'title' => $input['title'],
            'description' => $input['description'],
            'required_view_power' => $input['required_view_power'],
            'required_create_post_power' => $input['required_create_post_power'],
            'required_modify_post_power' => $input['required_modify_post_power'],
            'required_delete_post_power' => $input['required_delete_post_power'],
            'required_create_comment_power' => $input['required_create_comment_power'],
            'required_modify_comment_power' => $input['required_modify_comment_power'],
            'required_delete_comment_power' => $input['required_delete_comment_power'],
            'display_order' => $input['display_order'],
        ]);

        return redirect()->route('admin.dashboard')->withSuccess('The forum ' . $input['title'] . ' was successfully updated.');
    }

    public function warning(Request $request, Forum $forum)
    {
        return view('admin.forum.forum.delete', compact('forum'));
    }

    public function archive(Request $request, Forum $forum)
    {
        // Doesn't really delete, but put it to the archives category
        $forum->archive();
        return redirect()->route('admin.dashboard')->withSuccess('The forum ' . $forum->title . ' was successfully deleted.');
    }
}
