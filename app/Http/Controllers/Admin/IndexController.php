<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function addNews(Request $request)
    {
        if ($request->isMethod('post')) {

            $arr = $request->except('_token');
            $request->flash();
            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            DB::table('news')->insert([
                'title' => $arr['title'],
                'text' => $arr['text'],
                'isPrivate' => $arr['isPrivate'] = $arr['isPrivate'] ?? false,
                'image' => $url,
            ]);

            return redirect()
                ->route('news.item', DB::table('news')
                    ->where('title', $arr['title'])
                    ->get()[0]->id);
        }
        return view('admin.addition')->with('categories', DB::table('categories')->get());
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
