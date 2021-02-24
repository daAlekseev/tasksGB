<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;


class IndexController extends Controller
{
    public function index()
    {
        $news = News::getAllNews();
        return view('news.index')->with('news', $news);
    }

    public function categories()
    {
        $categories = Categories::getCategories();
        return view('news.categories')->with('categories', $categories);
    }

    public function categoryId($key)
    {
        $news = News::getCatNews($key);
        return view('news.categoryId')->with([
            'id' => $key,
            'news' => $news,
        ]);
    }

    public function getItem($key, $id)
    {
        $news = News::getItem($key, $id);
        return view('news.item')->with('news', $news);
    }
}
