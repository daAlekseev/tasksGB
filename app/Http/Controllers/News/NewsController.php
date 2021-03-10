<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(5);
        return view('news.index')->with('news', $news);
    }

    public function getOneItem(News $news)
    {
        return view('news.item')->with('news', $news);
    }
}
