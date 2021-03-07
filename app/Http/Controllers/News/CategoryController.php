<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.categories')->with('categories', DB::table('categories')->get());
    }

    public function categoryById(News $news, Categories $categories, string $slug)
    {
        return view('news.categoryId')
            ->with('news', $news->getCategoryNews($categories->getCategoryIdBySlug($slug)));
    }
}
