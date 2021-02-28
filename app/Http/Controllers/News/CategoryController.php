<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Categories $categories)
    {
        return view('news.categories')
            ->with('categories', $categories->getCategories());
    }

    public function categoryById(News $news, Categories $categories, string $slug)
    {
        return view('news.categoryId')
            ->with('news', $news->getCategoryNews($categories->getCategoryIdBySlug($slug)));
    }
}
