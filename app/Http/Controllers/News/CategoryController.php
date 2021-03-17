<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.categories')->with('categories', Category::all());
    }

    public function categoryBySlug(string $slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        return view('news.categoryBySlug')
            ->with('news', $category->news)
            ->with('user', Auth::user());
    }
}
