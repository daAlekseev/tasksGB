<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index')->with('category', Category::all());
    }

    public function create(Category $category)
    {
        return view('admin.category.addition')->with('category', $category);
    }

    public function store(Request $request, Category $category)
    {
        return $this->insertDataHelper($request, $category);
    }

    public function show(Category $category)
    {
        return view('news.categoryBySlug')->with('news', $category->news);
    }

    public function edit(Category $category)
    {
        return view('admin.category.addition')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        return $this->insertDataHelper($request, $category);
    }

    public function destroy(Category $category)
    {
        $category->news()->delete();
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function insertDataHelper(Request $request, Category $category)
    {
        try {
            $category->fill($request->all())->save();
            return redirect()->route('news.categories.categoryBySlug', $category->slug);
        } catch (QueryException $e) {
            return back()->with('errorMessage', 'Введенные данные не могут быть использованы!');
        }
    }
}
