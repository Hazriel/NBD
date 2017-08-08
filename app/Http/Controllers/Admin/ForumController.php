<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function createCategoryForm()
    {
        return view('admin.forum.category.create');
    }

    public function createCategory(Request $request)
    {
    }
}
