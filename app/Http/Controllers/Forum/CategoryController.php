<?php

namespace App\Http\Controllers\Forum;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|min:3|max:100',
            'required_view_power' => 'required|int',
            'required_modify_power' => 'required|int',
            'required_delete_power' => 'required|int',
            'display_order' => 'required|int',
        ]);
    }

    public function createForm()
    {
        $pageTitle = "Create Category";
        return view('admin.forum.category.create', compact('pageTitle'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3|max:100',
            'required_view_power' => 'required|int',
            'required_modify_power' => 'required|int',
            'required_delete_power' => 'required|int',
            'display_order' => 'required|int',
        ]);

        $input = $request->all();
        Category::create([
            'title' => $input['title'],
            'required_view_power' => $input['required_view_power'],
            'required_modify_power' => $input['required_modify_power'],
            'required_delete_power' => $input['required_delete_power'],
            'display_order' => $input['display_order'],
        ]);

        return redirect()->route('admin.dashboard')->withSuccess('The forum category ' . $input['title'] . ' was successfully created.');
    }

    public function updateForm(Request $request, Category $category)
    {
        return view('admin.forum.category.update', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3|max:100',
            'required_view_power' => 'required|int',
            'required_modify_power' => 'required|int',
            'required_delete_power' => 'required|int',
            'display_order' => 'required|int',
        ]);

        $input = $request->all();
        $category->update([
            'title' => $input['title'],
            'required_view_power' => $input['required_view_power'],
            'required_modify_power' => $input['required_modify_power'],
            'required_delete_power' => $input['required_delete_power'],
            'display_order' => $input['display_order'],
        ]);

        return redirect()->route('admin.dashboard')->withSuccess('The category ' . $category->title . ' was updated successfully.');
    }
}
