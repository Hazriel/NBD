<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    protected function validator(array $data) {
        return Validator::make($data, [
            'title' => 'required|string|max:100',
            'content' => 'required|string'
        ]);
    }

    protected function create(array $data) {
        return News::create([
            'owner_id' => $data['owner_id'],
            'title'    => $data['title'],
            'content'  => $data['content']
        ]);
    }
}
