<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:100',
            'content' => 'required|string'
        ]);
    }

    /**
     * Creates a news with the given data.
     * @param array $data An array containing the fields of the news sent through a post request.
     * @return $this|\Illuminate\Database\Eloquent\Model The created news.
     */
    protected function create(array $data)
    {
        return News::create([
            'owner_id' => $data['owner_id'],
            'title'    => $data['title'],
            'content'  => $data['content']
        ]);
    }

    /**
     * Redirects to the news form view.
     */
    public function createForm(Request $request)
    {
        return view('admin.news.create');
    }

    /**
     * Handles the post request to create a news.
     */
    public function createNews(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->create($input);

        return redirect()->route('admin.dashboard')->withSuccess('News was successfully posted.');
    }

}
