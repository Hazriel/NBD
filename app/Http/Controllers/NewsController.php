<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use phpDocumentor\Reflection\Types\Integer;

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

        $ownerId = $request->user()->id;

        $input['owner_id'] = $ownerId;

        $this->create($input);

        return redirect()->route('admin.dashboard')->withSuccess('News was successfully posted.');
    }

    /**
     * Get a set of news already formatted to be printed on the news page
     * @param Request $request
     * @param $page
     */
    public function getNewsList($page) {
        $newsList = $this->getPage($page);
        return view('news.list', compact('newsList'));
    }

    /**
     * Get a set of news for the admin dashboard.
     * @param Request $request
     * @param $page
     * @return News[]
     */
    public function getAdminNewsList(Request $request, $page) {
        $newsList = $this->getPage($page);
        return view('admin.news.list', compact('newsList'));
    }

    /**
     * Return a collection of news corresponding to the given page.
     * @param $page Integer The page to be returned.
     * @return News[]
     */
    private function getPage($page) {
        // Make sure the page is correctly formatted, if not default is 1
        if ($page == null || $page < 1)
            $page = 1;

        $newsPerPage = config('app.ADMIN_NEWS_PER_PAGE', 5);
        $firstNewsIndex = ($page - 1) * $newsPerPage;
        $lastNewsIndex = $firstNewsIndex + $newsPerPage;

        return News::all()->sortByDesc('created_at')->slice($firstNewsIndex, $lastNewsIndex);
    }

    public function view() {
        $pageTitle = "News";
        $newsList = $this->getPage(1);
        $newsPageCount = $this->getPageCount();
        return view('news.view', compact('pageTitle', 'newsList', 'newsPageCount'));
    }

    /**
     * Gets the number of news pages.
     * @return int
     */
    private function getPageCount() {
        return News::all()->count() / config('app.NEWS_PER_PAGE') + 1;
    }
}
