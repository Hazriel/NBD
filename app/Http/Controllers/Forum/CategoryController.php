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
            'title' => 'required|string|min:3|max:100'
        ]);
    }

    public function createForm()
    {
        $pageTitle = "Create Category";
        return view('admin.forum.category.create', compact('pageTitle'));
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = $this->validator($input);
        if ($validator->fails())
            return redirect()->route('admin.forum.category.create')->withErrors($validator)->withInput();

        Category::create([
            'title' => $input['title'],
            'required_view_power' => $input['required_view_power'],
            'required_modify_power' => $input['required_modify_power'],
            'required_delete_power' => $input['required_delete_power']
        ]);

        return redirect()->route('admin.dashboard')->withSuccess('The forum category ' . $input['title'] . ' was successfully created.');
    }
}
