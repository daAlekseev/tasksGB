<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

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

    public function store(CategoryRequest $request, Category $category)
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

    public function update(CategoryRequest $request, Category $category)
    {
        return $this->insertDataHelper($request, $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function insertDataHelper(CategoryRequest $request, Category $category)
    {
        $request->validated();
        $data = $category->fill($request->all())->save();
        if ($data) {
            return redirect()->route('news.categories.categoryBySlug', $category->slug);
        } else {
            return redirect()
                ->route('admin.categories.create')
                ->with('errorMessage', 'Введенные данные не могут быть использованы!');
        }
    }
}
