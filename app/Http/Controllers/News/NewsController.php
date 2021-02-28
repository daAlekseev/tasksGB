<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;


class NewsController extends Controller
{
    public function index(News $news)
    {
        return view('news.index')->with('news', $news->getAllNews());
    }

    public function getOneItem(News $news, $slug, $id)
    {
        return view('news.item')
            ->with('slug', $slug)
            ->with('news', $news->getOneItemById($id));
    }
}
