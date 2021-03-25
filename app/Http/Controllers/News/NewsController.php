<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->orderBy('pubDate', 'DESC')->paginate(5);
        return view('news.index')
            ->with('news', $news)
            ->with('user', Auth::user());
    }

    public function getOneItem(News $news)
    {
        return view('news.item')
            ->with('news', $news)
            ->with('user', Auth::user());
    }
}
