<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    public function addNews(Request $request, Categories $categories, News $news)
    {
        if($request->isMethod('post')) {
            $arr = $request->except('_token');
            $all = $news->getAllNews();
            switch ($arr['catId']) {
                case 1:
                    $arr['slug'] = "sport";
                    break;
                case 2:
                    $arr['slug'] = "politics";
                    break;
                case 3:
                    $arr['slug'] = "art";
                    break;
            }
            $arr['id'] = count($all) + 1;
            $arr['isPrivate'] = $arr['isPrivate'] ?? 0;
            $all[] = $arr;
            File::put(storage_path() . '/news.json',
                 json_encode($all, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            return redirect()->route('news.categories.item', ['key' => $arr['slug'],'id' => $arr['id']]);
        }
        return view('admin.addition')->with('categories', $categories->getCategories());
    }

    public function test1(News $news)
    {
        return response()->json($news->getAllNews())
            ->header('Content-Disposition', 'attachment; filename = "allNewsJson.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2()
    {
        return view('admin.test2');
    }
}
