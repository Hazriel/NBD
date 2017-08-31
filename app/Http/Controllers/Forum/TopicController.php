<?php

namespace App\Http\Controllers\Forum;

use App\Forum;
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
        $this->validate([
            ''
        ]);
        return route()->redirect('admin.dashboard')->withSuccess('Topic was created successfully.');
    }
}
