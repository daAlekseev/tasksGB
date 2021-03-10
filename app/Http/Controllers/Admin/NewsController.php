<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::paginate(5);
        return view('admin.news.index')
            ->with('news', $news);
    }


    public function create(News $news)
    {
        return view('admin.news.addition')
            ->with('categories', Category::all())
            ->with('news', $news);
    }


    public function store(Request $request, News $news)
    {
        return $this->insertDataHelper($request, $news);
    }


    public function show(News $news)
    {
        return view('news.item')->with('news', $news);
    }

    public function edit(News $news)
    {
        return view('admin.news.addition')
            ->with('news', $news)
            ->with('categories', Category::all());
    }

    public function update(Request $request, News $news)
    {
        return $this->insertDataHelper($request, $news);
    }


    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }

    public function insertDataHelper(Request $request, News $news)
    {
        $request->flash();
        $url = null;

        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->isPrivate = $request->has('isPrivate');
        $news->image = $url;
        $news->fill($request->all())->save();

        return redirect()
            ->route('news.item', $news->id);
    }
}
