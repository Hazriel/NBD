<?php

namespace App\Http\Controllers\Forum;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function createForm(Request $request, Category $category)
    {
        return view('admin.forum.forum.create', compact('category'));
    }
}
